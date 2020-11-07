<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('ISBN')->nullable();
            $table->string('Titulo')->nullable();
            $table->date('Fecha')->nullable();
            $table->double('PVP',10,2)->nullable();
            $table->integer('editorial_id')->unsigned();
            $table->foreign('editorial_id')->references('id')->on('editorials')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('libros');
    }
}
