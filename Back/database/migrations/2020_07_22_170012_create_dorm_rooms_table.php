<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDormRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dorm_rooms', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->integer('numberOfRooms')->unsigned();
            $table->integer('numberOfBathrooms')->unsigned();
            $table->integer('numberOfResidents')->unsigned();
            $table->float('size');
            $table->float('price')->unsigned();
            $table->boolean('allowsAnimals');
            $table->unsignedBigInteger('user_id')->usigned()->nullable();
            $table->timestamps();
        });


        Schema::table('dorm_rooms', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dorm_rooms');
    }
}
