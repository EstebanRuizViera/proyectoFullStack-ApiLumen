<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->integer('vuelosid')->unsigned();
            $table->integer('usuariosid')->unsigned();
            $table->date('departure_date');
            $table->date('arrival_date')->nullable();
            
        });
        Schema::table('reservations', function($table){
            $table->foreign('vuelosid')->references('id')->on('flights')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('usuariosid')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
