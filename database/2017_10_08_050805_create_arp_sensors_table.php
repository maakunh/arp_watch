<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArpSensorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arp_sensors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sensor_id')->unique();
            $table->string('mac_address');
            $table->string('version');
            $table->string('comment')->nullable();
            $table->integer('sensor_status')->nullable();
            $table->string('network_addr')->nullable();
            $table->string('ip_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arp_sensors');
    }
}
