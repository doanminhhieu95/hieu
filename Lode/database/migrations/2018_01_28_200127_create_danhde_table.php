<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDanhdeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danhde', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('iduser')->unsigned();
            $table->date('ngaydanh');
            $table->string('number');
            $table->integer('money');
            $table->integer('jackpot');
            $table->integer('idcity')->unsigned();
            $table->integer('idkieuchoi')->unsigned();

            $table->foreign('iduser')->references('id')->on('users');
            $table->foreign('idcity')->references('id')->on('city');
            $table->foreign('idkieuchoi')->references('id')->on('kieuchoi');

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
        Schema::dropIfExists('danhde');
    }
}
