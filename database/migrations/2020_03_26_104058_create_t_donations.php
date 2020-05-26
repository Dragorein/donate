<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTdonations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_donations', function (Blueprint $table) {
            $table->increments('donations_id');
            $table->unsignedInteger('submisi_id');
            $table->unsignedInteger('user_id');
            $table->foreign('submisi_id')->references('submisi_id')->on('t_submisi');
            $table->string('donations_name', 255);
            $table->string('donations_mail', 255);
            $table->string('donations_phone', 255);
            $table->integer('donations_nominal');
            $table->boolean('donations_is_anonymous');
            $table->date('created_at')->useCurrent();
            $table->date('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_donations');
    }
}
