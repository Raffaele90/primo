<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_evento')->nullable();

            $table->string('denominazione_evento');
            $table->string('origine_luogo_id')->nullable();
            $table->string('nuovo_luogo_id')->nullable();
            $table->text('descrizione_evento')->nullable();
            $table->integer('data_evento')->nullable();
            $table->text('descrizione_movimento_opera')->nullable();
            $table->string('tipo_sub_evento')->nullable();
            $table->text('ulteriore_caratterizzazione')->nullable();



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personaggio', function($table) {
            $table->dropColumn('id');
            $table->dropColumn('tipo_evento');
            $table->dropColumn('denominazione_evento');
            $table->dropColumn('origine_luogo_id');
            $table->dropColumn('nuovo_luogo_id');
            $table->dropColumn('descrizione_evento');
            $table->dropColumn('anno_evento');
            $table->dropColumn('descrizione_movimento_opera');
            $table->dropColumn('tipo_sub_evento');




        });
    }
}
