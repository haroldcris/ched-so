<?php

use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = DB::table('level');

        $table->insert(
        [
        	['code' => '40', 'description' => 'Associate'],
        	['code' => '50', 'description' => 'Bachelor'],
        	['code' => '70', 'description' => 'Post'],
        	['code' => '90', 'description' => 'Ph.D.'],    
        ]);
    }
}
