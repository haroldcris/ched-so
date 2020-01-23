<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('code',20);
            $table->string('type', 20)->default('');  // LUC, Private, CHED
            $table->string('name',200); //Name of School
            
            $table->string('province',100)->default('');
            $table->string('town',100)->default('');  

            $table->string('recognition_number',50)->default('');
            $table->string('contact_person', 50)->default('');
            $table->string('contact_number', 50)->default('');            

            
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
        Schema::dropIfExists('school');
    }
}
