<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Admin',
            'password' => bcrypt('password'),
            'email' => 'admin@royalforum.herokuapp.com',
            'admin' => 1,
            'avatar' => asset('avatars/avatar.png')
        ]);

        App\User::create([
            'name' => 'Prince Pablo',
            'password' => bcrypt('password'),
            'email' => 'prince@pablo.com',
            'avatar' => asset('avatars/avatar.png')
        ]);
    }
}
