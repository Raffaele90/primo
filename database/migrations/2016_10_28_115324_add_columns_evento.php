<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsEvento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('evento', function($table) {
            $table->string('denominazione_evento');
            $table->integer('origine_luogo_id')->nullable();
            $table->integer('nuovo_luogo_id')->nullable();
            $table->text('descrizione_evento')->nullable();
            $table->integer('anno_evento')->nullable();
            $table->text('descrizione_movimento_opera')->nullable();
            $table->string('tipo_sub_evento')->nullable();






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
