<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Klasemen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klasemen', function (Blueprint $table) {
            $table->id();
            $table->integer('klub_id')->unsigned();
            $table->integer('bertanding');
            $table->integer('menang');
            $table->integer('draw');
            $table->integer('kalah');
            $table->integer('jumlah_goal');
            $table->integer('jumlah_kebobolan');
            $table->integer('point');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('klub_id')->references('id')->on('klub');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('klasemen');
    }
}
