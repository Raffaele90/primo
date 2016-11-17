<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Personaggio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personaggio', function (Blueprint $table) {
            $table->increments('idPersonaggio');
            $table->string('nome');
            $table->string('cognome');
            $table->date('data_nascita')->nullable();
            $table->string('luogo_nascita')->nullable();
            $table->date('data_morte')->nullable();
            $table->string('luogo_morte')->nullable();
            $table->text('descrizione')->nullable();
            $table->string('tipo')->nullable();
            $table->string('dinastia')->nullable();

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
