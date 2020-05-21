<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTSubmisi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_submisi', function (Blueprint $table) {
            $table->increments('submisi_id');
            $table->string('submisi_judul', 255);
            $table->text('submisi_cerita');
            $table->string('submisi_phone', 255);
            $table->string('submisi_tipe', 255);
            $table->string('submisi_hub_relasi', 255);
            $table->string('submisi_link', 255);
            $table->text('submisi_tujuan');
            $table->string('submisi_foto', 255);
            $table->date('submisi_expired_at');
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
        Schema::dropIfExists('t_submisi');
    }
}