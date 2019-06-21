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

        DB::table('users')->insert([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@gmail.com',
            'password' => md5('securepassword')
        ]);

        DB::table('categories')->insert([
            [
                'title' => 'Seeded Project 1',
                'description' => 'Project Description'
            ],
            [
                'title' => 'Seeded Project 2',
                'description' => 'Project Description'
            ],
            [
                'title' => 'Seeded Project 3',
                'description' => 'Project Description'
            ],
        ]);
    }
}
