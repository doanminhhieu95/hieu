<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKieuchoiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kieuchoi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('giaithuong');
            $table->integer('money');
            $table->longText('luatchoi');
            $table->integer('loai');
            $table->integer('max');
            $table->integer('idloaide')->unsigned();
            $table->integer('idarea')->unsigned();

            $table->foreign('idloaide')->references('id')->on('loaide');
            $table->foreign('idarea')->references('id')->on('area');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kieuchoi');
    }
}
