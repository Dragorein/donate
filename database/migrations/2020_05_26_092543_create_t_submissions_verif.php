<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTSubmissionsVerif extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_submissions_verif', function (Blueprint $table) {
            $table->increments('submisi_verif_id');
            $table->unsignedInteger('submisi_id');
            $table->foreign('submisi_id')->references('submisi_id')->on('t_submissions');
            $table->string('submisi_foto_verifikasi', 255);
            $table->boolean('submisi_is_verifikasi');
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
        Schema::dropIfExists('t_submissions_verif');
    }
}