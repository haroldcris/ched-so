<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->renameColumn('name','username');
            $table->string('name', 50)->change();

            $table->string('role',50)->default('')->after('name');
            
            $table->string('schoolcode',20)->default('')
                                            ->after('role');


            // $table->string('created_by', 50)->default('');
            // $table->string('updated_by', 50)->default('');                                           
            
            // $table->timestamp('updated_at')->useCurrent();
            // $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('username','name');

            $table->dropColumn(['role','schoolcode']);
        });
    }
}
