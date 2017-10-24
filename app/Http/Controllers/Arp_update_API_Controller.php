<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Arp_record;
use App\Arp_control;

class Arp_update_API_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request -> ip_address != '0.0.0.0'){
            
         //追加処理
            $arp_records = new arp_record;
            $arp_records -> timeval = $request -> timeval;
            $arp_records -> mac_address = $request -> mac_address;
            $arp_records -> ip_address = $request -> ip_address;
            $arp_records -> pcap_fname = $request -> pcap_fname;
            $arp_records -> sensor_id = $request -> sensor_id;
            $arp_records -> save();
   
            //既存履歴の更新
            $arp_records_control_count = Arp_control::where('sensor_id',$request -> sensor_id)->where('mac_address',$request -> mac_address)->where('ip_address',$request -> ip_address)->count();
            $arp_records_controls = Arp_control::where('sensor_id',$request -> sensor_id)->where('mac_address',$request -> mac_address)->where('ip_address',$request -> ip_address)->get();
             if($arp_records_control_count > 0){
                foreach($arp_records_controls as $arp_records_control){
                    //履歴テーブルの更新
                    Arp_record::where('sensor_id',$request -> sensor_id)
                              ->where('mac_address',$arp_records_control->mac_address)
                              ->where('ip_address',$arp_records_control->ip_address)
                              ->update(['status' => $arp_records_control->status]);
                        return response("OK_CRE_UPD1", 201);
                }
            }else{
                   return response("OK_CRE_UPD2", 201);
                    
            }
        }
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
