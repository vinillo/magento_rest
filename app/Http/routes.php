<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'ApiController@overview');
Route::get('/api/add/shipment', 'ApiController@addShipment'); /* currently not using this */
Route::post('/api/add/tracking/', 'ApiController@addTracking');
