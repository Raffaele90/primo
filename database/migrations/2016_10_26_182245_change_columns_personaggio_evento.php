<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnsPersonaggioEvento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personaggio', function ($table) {
            $table->renameColumn('idPersonaggio', 'id');

        });
        Schema::table('evento', function ($table) {
            $table->renameColumn('idEvento', 'id');

        });
        Schema::table('evento_personaggio', function ($table) {
            $table->renameColumn('idEvento', 'evento_id');
            $table->renameColumn('idPersonaggio', 'personaggio_id');


        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personaggio', function ($table) {



        });
    }
}