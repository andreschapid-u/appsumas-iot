<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mac')->unique();
            $table->boolean("state");
            $table->string("current_tag_id")->nullable();
            $table->string("name");
            // $table->enum("feedback",["Neutral", "Correct", "Incorrect"]);
            $table->enum("feedback",[0,1,2])->comment("Neutral=0, Correct=1, Incorrect=2");
            $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
        Schema::table('devices', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devices');
    }
}
