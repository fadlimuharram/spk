<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaiAlternativeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_alternative', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nilai',20);
        });

        Schema::table('nilai_alternative',function(Blueprint $table){
          $table->integer('datasatu')->unsigned();
          $table->foreign('datasatu')->references('id')->on('alternative')->onDelete('cascade')->onUpdate('cascade');
          $table->integer('datadua')->unsigned();
          $table->foreign('datadua')->references('id')->on('alternative')->onDelete('cascade')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_alternative');
        Schema::table('nilai_alternative',function(Blueprint $table){
          $table->dropForeign(['datasatu']);
          $table->dropForeign(['datadua']);
        });
    }
}
