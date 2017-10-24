<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Arp_record;
use App\Arp_control;
use App\Arp_block;
use App\Arp_sensor;
use Validator;


class Arp_update_Controller extends Controller
{
    //ホーム
    public function index(){
       
        $arp_records = Arp_record::orderby('created_at', 'desc')->paginate(10);
        $arp_records_check = count(Arp_record::where('status', null)->get());
        return view('home',['arp_records' => $arp_records, 'arp_records_check' => $arp_records_check]);
        
    }
    //ステータス指定一覧
    public function status_select(Request $request){
        $arp_records = Arp_record::where('status', $request->status)->orderby('created_at', 'desc')->paginate(10);
        $arp_records_check = count(Arp_record::where('status', null)->get());
        return view('home',['arp_records' => $arp_records, 'arp_records_check' => $arp_records_check]);
    }
    
    public function delete_control(Arp_control $arp_record){
        $arp_record->delete();
        return redirect('/arp_control');
    }

   
    
    //追加
    public function store(){
        //
    }
    //削除
    public function delete(Request $request){
        
    }
    //更新
    public function edit(Request $request){
        $arp_records = Arp_control::where('mac_address', $request->mac_address)->where('ip_address', $request->ip_address)->get();
        $arp_control_count = count($arp_records);
        
        return view('edit', ['arp_record' => $request, 'arp_control_count' => $arp_control_count]);
    }
    //更新
    public function update(Request $request){
        //履歴テーブルの更新
        Arp_record::where('mac_address',$request->item_mac_address)
                  ->where('ip_address',$request->item_ip_address)
                  ->where('sensor_id',$request->item_sensor_id)
                  ->update(['status' => $request->item_status]);
                  
        $arp_records_check = Arp_control::where('sensor_id', $request->item_sensor_id)
                                    ->where('mac_address', $request->item_mac_address)
                                    ->where('ip_address', $request->item_ip_address)
                                    ->count();
        
        if($arp_records_check == 0){
            //コントロールテーブルへの追加
            $arp_records = new Arp_control;
            $arp_records -> sensor_id = $request -> item_sensor_id;
            $arp_records -> mac_address = $request -> item_mac_address;
            $arp_records -> ip_address = $request -> item_ip_address;
            $arp_records -> status = $request -> item_status;
            $arp_records -> save();
        }else{
            //コントロールテーブル更新
            Arp_control::where('sensor_id', $request->item_sensor_id)->where('mac_address', $request->item_mac_address)->where('ip_address', $request->item_ip_address)
                        ->update(['status' => $request->item_status]);
        }
        
        // 「/」 コントロールテーブル画面へ遷移
        return redirect('/arp_control');

    }
    
    public function list_control(){
        $arp_records = Arp_control::orderby('sensor_id','asc')->orderby('mac_address', 'asc')->paginate(10);
        return view('list_control', ['arp_records' => $arp_records]);
    }
    
        //更新
    public function edit_control(Request $request){
        return view('edit_control', ['arp_record' => $request]);
    }

    public function update_control(Request $request){
        //履歴テーブルの更新
        Arp_record::where('sensor_id',$request->item_sensor_id)
                  ->where('mac_address',$request->item_mac_address)
                  ->where('ip_address',$request->item_ip_address)
                  ->update(['status' => $request->item_status]);
                  
        //コントロールテーブルの更新
        $arp_records = Arp_control::find($request->id);
        $arp_records->status = $request->item_status;
        $arp_records->save(); 
        // コントロールテーブル画面にリダイレクト
        return redirect('/arp_control');
       
    }
    
    public function update_delete_control(Request $request){
        Arp_control::where('id',$request->id)
                    ->delete();
                    
        Arp_record::where('sensor_id',$request->sensor_id)
                  ->where('mac_address',$request->mac_address)
                  ->where('ip_address',$request->ip_address)
                  ->update(['status' => null ]);
        return redirect('/arp_control');
    }
 
    public function store_control(Request $request){
            //コントロールテーブルへの追加
            $arp_records = new Arp_control;
            $arp_records -> sensor_id = $request -> item_sensor_id;
            $arp_records -> mac_address = $request -> item_mac_address;
            $arp_records -> ip_address = $request -> item_ip_address;
            $arp_records -> status = $request -> item_status;
            $arp_records -> save();
        
            return redirect('/arp_control');
        
    }
    
    public function list_block(){
        $arp_blocks = Arp_block::orderby('created_at', 'desc')->paginate(10);
        return view('list_block', ['arp_blocks' => $arp_blocks]);
    }


//センサー一覧
    public function arp_sensor(){
        $arp_sensors = Arp_sensor::orderby('sensor_id')->paginate(10);
        return view('arp_sensor', ['arp_sensors' => $arp_sensors]);
    }
    
    public function arp_sensor_edit(Arp_sensor $arp_sensors){
        return view('edit_sensor', ['arp_sensor' => $arp_sensors]);
    }
    
     public function arp_sensor_update(Request $request){
         Arp_sensor::where('id',$request->id)
                  ->update(['comment' => $request->comment, 'sensor_status' => $request->sensor_status, 'network_addr' => $request->network_addr, 'ip_address' => $request->ip_address]);
        return redirect('/arp_sensor');
       
    }
    
    public function delete_sensor(Arp_sensor $arp_sensor){
        $arp_sensor->delete();
        return redirect('/arp_sensor');
        
    }

//検知ノード一覧
    public function arp_node(){
        $arp_nodes = Arp_record::distinct()->select('mac_address','ip_address','status','sensor_id')->orderby('sensor_id')->orderby('ip_address')->paginate(10);
        return view('arp_node', ['arp_nodes' => $arp_nodes]);
    }
    
}