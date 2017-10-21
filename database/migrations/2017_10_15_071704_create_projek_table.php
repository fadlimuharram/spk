<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjekTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projek', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama',30);
            $table->timestamps();
        });

        Schema::table('projek',function(Blueprint $table){
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('kriteria',function(Blueprint $table){
          $table->integer('projek_id')->unsigned();
          $table->foreign('projek_id')->references('id')->on('projek')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projek');
        Schema::table('projek',function(Blueprint $table){
          $table->dropForeign(['user_id']);
        });
        Schema::table('kriteria',function(Blueprint $table){
          $table->dropForeign(['projek_id']);
        });
    }
}
