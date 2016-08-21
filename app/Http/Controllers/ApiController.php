<?php

namespace App\Http\Controllers;

use App\Magento;
use Illuminate\Http\Request;

use App\Http\Requests;

class ApiController extends Controller
{
    public function __construct()
    {
       $this->rest = new Magento(array('url' => \Config::get('settings.api.url_token'), 'username' => \Config::get('settings.api.username'), 'password' => \Config::get('settings.api.password')));
       $this->rest_url = \Config::get('settings.api.url_rest');
    }

    public function overview()
    {

        $items = $this->rest->getItems($this->rest_url . \Config::get('settings.requests.items'), \Config::get('settings.requests.items_limit'));
        $orders = $this->rest->getOrders($this->rest_url . \Config::get('settings.requests.orders'), \Config::get('settings.requests.orders_limit'));
        $shipments = $this->rest->getShipments($this->rest_url . \Config::get('settings.requests.shipments'), \Config::get('settings.requests.shipments_limit'));
        return view('api.overview', ['items' => $items, 'orders' => $orders, 'shipments' => $shipments]);
    }

//    public function track()
//    {
//        $track = $this->rest->track($this->rest_url . \Config::get('settings.requests.track'),
//            \Config::get('settings.requests.track_limit'));
//        return view('api.track', ['track' => $track]);
//    }

//    public function deleteShipment($id = null)
//    {
//
//        $track = $this->rest->deleteShipment($this->rest_url.\Config::get('settings.requests.deleteShipment'), $id);
//        return view('api.track', ['track' => $track]);
//    }

    public function addShipment()
    {
        $track = $this->rest->addShipment($this->rest_url.\Config::get('settings.requests.addShipment'));
        return view('api.track', ['track' => $track]);
    }

    public function addTracking(Request $request)
    {
        $data = json_encode($request->all());
        $track = $this->rest->addTracking($this->rest_url.\Config::get('settings.requests.addTracking'),$data);
        return view('api.track', ['track' => $track]);
    }
}
