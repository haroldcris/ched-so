<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        
        //Add User
        $table = DB::table('users');
        $table->insert(
        [
            [ 'username'            => 'admin',
              'password'            => bcrypt('adminadmin'),
              'role'                => App\Models\Role::Admin,
              'email'               => 'admin@admin.com',
              'email_verified_at'   => now(),
              'remember_token'      => Str::random(10),
            ],
        ]);


        $this->call([
            SchoolSeeder::class,
            CourseSeeder::class,
            LevelSeeder::class,
            SchoolCourseSeeder::class
        ]);
        //$this->call(CourseSeeder::class);
    }
}
