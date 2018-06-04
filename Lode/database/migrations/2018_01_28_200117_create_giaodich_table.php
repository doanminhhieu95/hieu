<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiaodichTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giaodich', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('iduser')->unsigned();
            $table->string('tennguoigui');
            $table->dateTime('ngayGD')->nullable();
            $table->integer('idbank')->unsigned();
            $table->integer('moneyGD');
            $table->integer('tiensauGD');
            $table->string('trangthai');

            $table->foreign('idbank')->references('id')->on('nganhang');
            $table->foreign('iduser')->references('id')->on('users');
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
        Schema::dropIfExists('giaodich');
    }
}
