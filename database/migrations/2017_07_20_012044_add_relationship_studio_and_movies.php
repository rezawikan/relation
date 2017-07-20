<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipStudioAndMovies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->integer('studio_id')->unsigned()->change();
            $table->foreign('studio_id')->references('id')->on('studios')
          ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movies', function (Blueprint $table){
          $table->dropForeign('movies_studio_id_foreign');
        });

        Schema::table('movies', function (Blueprint $table){
            $table->dropIndex('movies_studio_id_foreign');
        });

        Schema::table('movies', function (Blueprint $table){
          $table->integer('studio_id')->change();
        });
    }
}
