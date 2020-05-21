<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTDonatur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_donatur', function (Blueprint $table) {
            $table->increments('donatur_id');
            $table->unsignedInteger('submisi_id');
            $table->foreign('submisi_id')->references('submisi_id')->on('t_submisi');
            $table->string('donatur_mail', 255);
            $table->string('donatur_phone', 255);
            $table->string('donatur_nominal', 255);
            $table->boolean('donatur_is_anonymous');
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
        Schema::dropIfExists('t_donatur');
    }
}