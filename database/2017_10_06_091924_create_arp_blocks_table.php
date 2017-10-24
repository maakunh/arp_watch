<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArpBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arp_blocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('timeval');
            $table->string('mac_address');
            $table->string('ip_address');
            $table->integer('result');
            $table->string('sensor_id');
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
        Schema::dropIfExists('arp_blocks');
    }
}
