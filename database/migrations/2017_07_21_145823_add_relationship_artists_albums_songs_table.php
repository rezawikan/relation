<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipArtistsAlbumsSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('albums', function (Blueprint $table) {
            $table->integer('artist_id')->unsigned()->change();
            $table->foreign('artist_id')->references('id')->on('artists')
                  ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('songs', function (Blueprint $table) {
            $table->integer('album_id')->unsigned()->change();
            $table->foreign('album_id')->references('id')->on('albums')
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
        Schema::table('albums', function (Blueprint $table) {
            $table->dropForeign('albums_artist_id_foreign');
        });

        Schema::table('albums', function (Blueprint $table) {
            $table->dropIndex('albums_artist_id_foreign');
        });

        Schema::table('albums', function (Blueprint $table) {
            $table->integer('artist_id')->change();
        });

        Schema::table('songs', function (Blueprint $table) {
            $table->dropForeign('songs_album_id_foreign');
        });

        Schema::table('songs', function (Blueprint $table) {
            $table->dropIndex('songs_album_id_foreign');
        });

        Schema::table('songs', function (Blueprint $table) {
            $table->integer('album_id')->change();
        });
    }
}
