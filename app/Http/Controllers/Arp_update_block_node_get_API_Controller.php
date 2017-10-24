<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Arp_record;
use App\Arp_control;


class Arp_update_block_node_get_API_Controller extends Controller
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
        $arp_records_controls = Arp_control::where('sensor_id',$request -> sensor_id)->where('status', 1)->get();
        $arp_respons = '';
        foreach ($arp_records_controls as $arp_records_control){
            $arp_respons_mac_address = $arp_records_control->mac_address;
            $arp_respons_ip_address = $arp_records_control->ip_address;
            $arp_respons = $arp_respons.'|'.$arp_respons_mac_address.','.$arp_respons_ip_address;
        }
        return response($arp_respons, 201);
            
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
