<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/arp_records_api','Arp_update_API_Controller');

Route::resource('/arp_records_del_api','Arp_update_del_API_Controller');

Route::resource('/arp_records_rsel_api','Arp_update_rsel_API_Controller');

Route::resource('/arp_records_csel_api','Arp_update_csel_API_Controller');

Route::resource('/arp_blocks_api','Arp_update_blocks_API_Controller');

Route::resource('/arp_sensors_api','Arp_update_sensor_API_Controller');

Route::resource('/arp_sensors_operation_get_api','Arp_update_operation_get_API_Controller');

Route::resource('/arp_sensors_operation_put_api','Arp_update_operation_put_API_Controller');

Route::resource('/arp_sensors_network_addr_get_api','Arp_update_network_addr_get_API_Controller');

Route::resource('/arp_sensors_block_node_get_api','Arp_update_block_node_get_API_Controller');

Route::resource('/arp_sensors_ip_addr_get_api','Arp_update_ip_addr_get_API_Controller');

Route::resource('/arp_controls_ip_get_api','Arp_update_controls_ip_get_API_Controller');
