<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKieuchoigiaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kieuchoigiai', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idkieuchoi')->unsigned();
            $table->integer('idgiai')->unsigned();

            $table->foreign('idgiai')->references('id')->on('giai');
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
        Schema::dropIfExists('kieuchoigiai');
    }
}
