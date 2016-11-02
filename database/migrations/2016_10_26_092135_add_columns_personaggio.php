<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsPersonaggio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('personaggio', function($table) {
            $table->string('nome_dinastia')->nullable();
            $table->integer('padre_id')->nullable()->unsigned();
            $table->integer('madre_id')->nullable()->unsigned();
            $table->integer('coniuge1_id')->nullable()->unsigned();
            $table->integer('coniuge2_id')->nullable()->unsigned();
            $table->integer('coniuge3_id')->nullable()->unsigned();





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
            $table->dropColumn('nome_dinastia');
            $table->dropColumn('padre_id');
            $table->dropColumn('madre_id');
            $table->dropColumn('coniuge1_id');
            $table->dropColumn('coniuge2_id');
            $table->dropColumn('coniuge3_id');



        });
    }
}
