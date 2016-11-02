<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventoPersonaggioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento_personaggio', function (Blueprint $table) {
            $table->integer('evento_id')->unsigned()->nullable();
            $table->foreign('evento_id')->references('id')
                ->on('evento')->onDelete('cascade');

            $table->integer('personaggio_id')->unsigned()->nullable();
            $table->foreign('personaggio_id')->references('id')
                ->on('personaggio')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
