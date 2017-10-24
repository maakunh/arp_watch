<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Arp_sensor;

class Arp_update_sensor_API_Controller extends Controller
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
        $arp_sensors_count = Arp_sensor::where('sensor_id',$request -> sensor_id)->count();
        
        if($arp_sensors_count == 0){
          //追加処理
            $arp_sensors = new Arp_sensor;
            $arp_sensors -> sensor_id = $request -> sensor_id;
            $arp_sensors -> mac_address = $request -> mac_address;
            $arp_sensors -> version = $request -> version;
            $arp_sensors -> comment = '';
            $arp_sensors -> sensor_status = $request -> sensor_status;
            $arp_sensors -> save();
            return response("OK_CRE_SENSOR", 201);
        }else{
        //更新
                    //$arp_sensors = Arp_sensor::where('sensor_id',$request -> sensor_id)->get();
                    //foreach($arp_sensors as $arp_sensor){
                    Arp_sensor::where('sensor_id',$request -> sensor_id)
                              ->update(['sensor_status' => $request->sensor_status]);
                    //}
                        return response("OK_UPD_SENSOR", 201);    
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
