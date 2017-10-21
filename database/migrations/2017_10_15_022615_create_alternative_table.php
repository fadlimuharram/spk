<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlternativeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternative', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama',50);
        });

        Schema::table('alternative',function(Blueprint $table){
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
          $table->integer('kriteria_id')->unsigned();
          $table->foreign('kriteria_id')->references('id')->on('kriteria')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alternative');
        Schema::table('alternative',function(Blueprint $table){
          $table->dropForeign(['user_id']);
          $table->dropForeign(['kriteria_id']);
        });
    }
}
