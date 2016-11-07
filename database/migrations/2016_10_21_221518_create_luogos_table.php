<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLuogosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('luogo', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('denominazione_luogo');
            $table->string('anno_costruzione')->nullable();
            $table->string('descrizione_monumento')->nullable();
            $table->string('localizzazione_luogo')->nullable();
            $table->string('tipo_luogo');
            $table->string('ulteriore_caratterizzazione')->nullable();
            $table->string('tipo_sub_luogo');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('luogo');
    }
}


