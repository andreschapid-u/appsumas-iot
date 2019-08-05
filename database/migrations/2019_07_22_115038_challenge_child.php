<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChallengeChild extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenges_children', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("challenge_id");
            $table->unsignedBigInteger("child_id");
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('challenges_children', function (Blueprint $table) {
            $table->foreign('challenge_id')->references('id')->on('challenges');
            $table->foreign('child_id')->references('id')->on('children');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('challenges_children');
    }
}
