<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolCourse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school-course', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('schoolId');
            $table->unsignedBigInteger('courseId');
            $table->unsignedInteger('levelId');


            $table->string('created_by', 50)->default('');
            $table->string('updated_by', 50)->default('');
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();

            $table->foreign('courseId')
                  ->references('id')->on('course')
                  ->onDelete('cascade');

            $table->foreign('schoolId')
                  ->references('id')->on('school')
                  ->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school-course');
    }
}
