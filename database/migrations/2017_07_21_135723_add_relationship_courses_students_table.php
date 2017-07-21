<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipCoursesStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_students', function (Blueprint $table) {
            $table->integer('student_id')->unsigned()->change();
            $table->foreign('student_id')->references('id')->on('students')
                  ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('course_id')->unsigned()->change();
            $table->foreign('course_id')->references('id')->on('courses')
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
        Schema::table('course_students', function (Blueprint $table) {
            $table->dropForeign('course_students_student_id_foreign');
        });

        Schema::table('course_students', function (Blueprint $table) {
            $table->dropIndex('course_students_student_id_foreign');
        });

        Schema::table('course_students', function (Blueprint $table) {
            $table->integer('student_id')->change();
        });

        Schema::table('course_students', function (Blueprint $table) {
            $table->dropForeign('course_students_course_id_foreign');
        });

        Schema::table('course_students', function (Blueprint $table) {
            $table->dropIndex('course_students_course_id_foreign');
        });

        Schema::table('course_students', function (Blueprint $table) {
            $table->integer('course_id')->change();
        });
    }
}
