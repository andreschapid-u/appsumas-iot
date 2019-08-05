<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChildLevel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('children_levels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("child_id");
            $table->unsignedBigInteger("level_id");

            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('children_levels', function (Blueprint $table) {
            $table->foreign('child_id')->references('id')->on('children');
            $table->foreign('level_id')->references('id')->on('levels');
            $table->unique(["child_id", "level_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('children_levels');
    }
}
