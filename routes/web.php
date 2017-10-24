<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Arp_record;
use Illuminate\Http\Request;

//ホーム画面
Route::match(array('GET', 'POST'),'/', 'Arp_update_Controller@index');

//レコード追加処理
Route::post('/arp_records', 'Arp_update_Controller@store');

//レコード削除処理
Route::delete('/arp_record/delete', 'Arp_update_Controller@delete');

//レコード変更画面
Route::post('/arp_record_edit', 'Arp_update_Controller@edit');

//レコード変更処理
Route::post('/arp_records/update', 'Arp_update_Controller@update');

//コントロールテーブル一覧画面
Route::get('/arp_control', 'Arp_update_Controller@list_control');

//コントロールテーブル　レコード変更画面
Route::post('/arp_control_edit', 'Arp_update_Controller@edit_control');

//
Route::post('/arp_control/store','Arp_update_Controller@store_control');

//
Route::post('/arp_control/update','Arp_update_Controller@update_control');

//
Route::post('/arp_control/update_delete','Arp_update_Controller@update_delete_control');

//
Route::delete('/arp_control/delete/{arp_record}','Arp_update_Controller@delete_control');

//ブロック履歴一覧画面
Route::get('/arp_block', 'Arp_update_Controller@list_block');


//ステータス指定
Route::match(array('GET', 'POST'), '/status_select', 'Arp_update_Controller@status_select');

//センサー一覧
Route::get('/arp_sensor','Arp_update_Controller@arp_sensor');

Route::post('/arp_sensor_edit/{arp_sensors}','Arp_update_Controller@arp_sensor_edit');

Route::post('/arp_sensor/update','Arp_update_Controller@arp_sensor_update');

Route::delete('/arp_sensor/update_delete/{arp_sensor}','Arp_update_Controller@delete_sensor');

//ノード一覧
Route::get('/arp_node', 'Arp_update_Controller@arp_node');
