<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTPayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_payment', function (Blueprint $table) {
            $table->increments('payment_id');
            $table->unsignedInteger('donatur_id');
            $table->foreign('donatur_id')->references('donatur_id')->on('t_donatur');
            $table->string('payment_type', 255);
            $table->string('payment_va_number', 255);
            $table->boolean('payment_is_lunas');
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
        Schema::dropIfExists('t_payment');
    }
}