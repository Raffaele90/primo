<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDinastiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dinastia', function (Blueprint $table) {
            $table->integer('personaggio_id')->unsigned();
            $table->foreign('personaggio_id')
                ->references('idPersonaggio')->on('personaggio')
                ->onDelete('cascade');
            $table->string('nome_dinastia');
            $table->integer('padre_id');
            $table->integer('madre_id');
            $table->integer('coniuge1_id');
            $table->integer('coniuge2_id');
            $table->integer('coniuge3_id');

        });
    }

    public function down()
    {
        Schema::drop('dinastia');
    }
}
