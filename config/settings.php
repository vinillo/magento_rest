<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Api settings magento
    |--------------------------------------------------------------------------
    | Setting to configure magento REST api requests etc
    |
    |
    |
    */
    'api' => [
        'username' => 'root',
        'password' => 'azerty12',
        'url_token' => 'http://localhost/api_m/index.php/rest/V1/integration/admin/token',
        'url_rest' => 'http://localhost/api_m/index.php/rest/V1/'],

    'requests' =>
        ['items' => 'products/?searchCriteria[page_size]=', 'items_limit' => 10,
            'orders' => 'orders/?searchCriteria[page_size]=', 'orders_limit' => 10,
            'shipments' => 'shipments/?searchCriteria[page_size]=', 'shipments_limit' => 10,
            'track' => 'shipment/track', 'track_limit' => 10,
            'deleteShipment' => 'shipment/',
            'addShipment' => 'shipment/',
            'addTracking' => 'shipment/track',

        ],

];