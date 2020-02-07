<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
        
            [ 'username'            => 'supervisor',
              'password'            => bcrypt('user1user1'),
              'role'                => App\Models\Role::Supervisor,
              'email'               => 'supervisor@chedro3.online',
              'email_verified_at'   => now(),
              'remember_token'      => Str::random(10),
            ],
        ]);


        $table->insert(
        [
            [ 'username'            => 'hei',
              'password'            => bcrypt('user2user2'),
              'role'                => App\Models\Role::HEI,
              'email'               => 'olfu@olfu.com',
              'schoolcode'          => '30139',
              'email_verified_at'   => now(),
              'remember_token'      => Str::random(10),
            ],
        ]);

    }
}
