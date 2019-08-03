<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("user_id");
            $table->boolean("estate")->default(false);
            $table->enum("difficulty", [1,2,3])->default(1);
            $table->smallInteger("num_sums")->default(0);
            $table->smallInteger("num_subtraction")->default(0);
            $table->timestamps();
        });

        Schema::table('challenges', function($table) {
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
        Schema::dropIfExists('challenges');
    }
}
