<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplication extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application', function (Blueprint $table) {
            $table->bigIncrements('id');         

            $table->bigInteger('schoolId');
            $table->string('school_type', 20);  // LUC, Private, CHED
            $table->string('school_name',200); //Name of School
            
            $table->string('school_province',100);
            $table->string('school_town',100);  

            $table->string('school_recognition_number',50)->default('');

            $table->string('course_code', 20);
            $table->string('course_description', 200); //BS Information Technology

            $table->date('graduation_date');
            
            $table->integer('student_count');

            $table->string('so_number',50);

            /*
                Filed, 
                Received, 
                Validated, 
                Approved,
                Released, 
                Void
            */

            $table->string('status', 50)->default('Filed');

            $table->string('filed_by', 50);
            $table->datetime('filed_at');

            $table->string('received_by', 50)->default('');
            $table->date('received_at'); //DOcument Arrived at the office
            
            $table->string('validated_by', 50)->default('');
            $table->date('validated_at');
            

            $table->string('approved_by', 50)->default('');
            $table->date('approved_at');

            $table->string('released_by', 50)->default('');
            $table->date('released_at');

            $table->string('void_by', 50)->default('');
            $table->date('void_at');



            $table->string('created_by', 50)->default('');
            $table->string('updated_by', 50)->default('');

            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application');
    }
}
