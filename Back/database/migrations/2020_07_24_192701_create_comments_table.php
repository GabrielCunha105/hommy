<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('postTime');
            $table->string('editTime');
            $table->string('content');
            $table->boolean('isPositive');
            $table->unsignedBigInteger('user_id')->usigned()->nullable();
            $table->unsignedBigInteger('dorm_room_id')->usigned()->nullable();
            $table->timestamps();
        });


        Schema::table('dorm_rooms', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('dorm_room_id')->references('id')->on('dorm_rooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
