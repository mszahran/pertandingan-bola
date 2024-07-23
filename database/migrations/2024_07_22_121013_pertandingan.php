<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pertandingan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertandingan', function (Blueprint $table) {
            $table->id();
            $table->integer('klub_id_1')->unsigned();
            $table->integer('klub_id_2')->unsigned();
            $table->integer('skor_klub_1')->nullable();
            $table->integer('skor_klub_2')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('klub_id_1')->references('id')->on('klub');
            $table->foreign('klub_id_2')->references('id')->on('klub');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pertandingan');
    }
}
