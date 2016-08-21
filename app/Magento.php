<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;

class Magento extends Model
{


    /**
     * Magento constructor.
     * @param array $args
     * AUTHENTICATION MAGENTO V2 REST API
     */
    public function __construct($args = array())
    {
        // $args needs to be an array to work with
        if (is_object($args)) {
            $args = get_object_vars($args);
        } elseif (!is_array($args)) {
            $args = array();
        }
        $args = array_merge(array(
            'url' => null,
            'username' => null,
            'password' => null,
        ), $args);
        // set all the properties to this object
        foreach ($args as $key => $value) {
            $this->$key = $value;
        }

        $data = array("username" => $this->username, "password" => $this->password);
        $data_string = json_encode($data);
        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string))
        );
        $token = curl_exec($ch);
        $token = json_decode($token);
        $this->auth_token = array("Authorization: Bearer $token"); // set auth token
    }

    /**
     * @param null $url
     * @param int $limit
     * @param bool $exclude
     * @return mixed Get Magento orders
     * Get Magento orders
     * @throws Exception
     */
    public function getItems($url = null, $limit = 10, $exclude = false)
    {
        if (empty($url)) {
            throw new Exception('Item url can\'t be blank.');
        }
        $product = curl_init($url . $limit);
        curl_setopt($product, CURLOPT_HTTPHEADER, $this->auth_token);
        curl_setopt($product, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($product);
        $products = json_decode($result);
        return $products;
    }


    /**
     * @param null $url
     * @param int $limit
     * @param bool $exclude
     * @return mixed|resource
     * @throws Exception
     */
    public function getOrders($url = null, $limit = 10, $exclude = false)
    {
        if (empty($url)) {
            throw new Exception('Order url can\'t be blank.');
        }
        $orders = curl_init($url . $limit);
        curl_setopt($orders, CURLOPT_HTTPHEADER, $this->auth_token);
        curl_setopt($orders, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($orders);
        $orders = json_decode($result);
        return $orders;
    }

    /**
     * @param null $url
     * @param int $limit
     * @param bool $exclude
     * @return mixed|resource
     * @throws Exception
     */
    public function getShipments($url = null, $limit = 10, $exclude = false)
    {
        if (empty($url)) {
            throw new Exception('Order url can\'t be blank.');
        }
        $shipments = curl_init($url . $limit);
        curl_setopt($shipments, CURLOPT_HTTPHEADER, $this->auth_token);
        curl_setopt($shipments, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($shipments);
        $shipments = json_decode($result);
        return $shipments;
    }


    /**
     * CURRENTLY NOT USING THIS
     * @param null $url
     * @return mixed|resource
     * @throws Exception
     *
     */
    public function addShipment($url = null)
    {
        if (empty($url)) {
            throw new Exception('Order url can\'t be blank.');
        }
        \Krumo($url);
        $shipments = curl_init($url);
        $curl_post_data = ['entity' => [
            'order_id' => 1,
            'items' => [
                'Iris Workout Top-XS-Red',
                'order_item_id' => 1,
                'qty' => 1,
                'parent_id' => 1,
                'price' => 0,
                'product_id' => 1420,
                'sku' => '"WS03-XS-Red',
                'weight' => 1
            ],
        ]
        ];


        curl_setopt($shipments, CURLOPT_POSTFIELDS, json_encode($curl_post_data));

        curl_setopt($shipments, CURLOPT_POST, 1);
        curl_setopt($shipments, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            $this->auth_token[0],
        ));
        curl_setopt($shipments, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($shipments, CURLOPT_RETURNTRANSFER, true);


        $result = curl_exec($shipments);
        return $shipments;
    }

    /**
     * @param null $url
     * @param null $data
     * @return mixed|resource
     * @throws Exception
     */
    public function addTracking($url = null, $data = null)
    {
        if (empty($url) || empty($data)) {
            throw new Exception('Order url can\'t be blank.');
        }
        $carrier = json_decode($data);
        $carrier_list = array('1' => 'DHL', '2' => 'Federal Express', '3' => 'United Parcel Service', '4' => 'United States Postal Service');
        $name = (!empty($carrier_list[$carrier->carrier]) ? $carrier_list[$carrier->carrier] : 'undefined');
        $shipments = curl_init($url);
        $curl_post_data = ['entity' => [
            'carrier_code' => $name,
            'description' => '',
            'order_id' => 1,
            'parent_id' => $carrier->entity,
            'qty' => '1',
            'title' => $name,
            'weight' => '1',
            'track_number' => '#' . strtoupper(str_replace('#', '', $carrier->tracking)),

        ]
        ];


        curl_setopt($shipments, CURLOPT_POSTFIELDS, json_encode($curl_post_data));

        curl_setopt($shipments, CURLOPT_POST, 1);
        curl_setopt($shipments, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            $this->auth_token[0],
        ));
        curl_setopt($shipments, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($shipments, CURLOPT_RETURNTRANSFER, true);


        $result = curl_exec($shipments);
        $shipments = json_decode($result);
        return $shipments;
    }

}
