<?php

use Illuminate\Database\Seeder;

use App\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::Create([

            'name' => 'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('password123'),
            'user_type' => 'admin'

        ]);

    }
}
