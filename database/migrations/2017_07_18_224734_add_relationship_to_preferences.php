<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipToPreferences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('preferences', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->change();
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::table('preferences', function (Blueprint $table) {
            $table->dropForeign('preferences_user_id_foreign');
        });

        Schema::table('preferences', function (Blueprint $table) {
            $table->dropIndex('preferences_user_id_foreign');
        });

        Schema::table('preferences', function (Blueprint $table) {
            $table->integer('user_id')->change();
        });
    }
}
