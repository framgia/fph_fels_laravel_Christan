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
            'password' => bcrypt('securepassword')
        ]);

        DB::table('users')->insert([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'is_admin' => 1,
            'email' => 'admin@gmail.com',
            'password' => bcrypt('securepassword')
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

        DB::table('words')->insert([
            [
                'category_id' => 1,
                'text' => 'Word 1',
            ],
            [
                'category_id' => 1,
                'text' => 'Word 2',
            ],
            [
                'category_id' => 1,
                'text' => 'Word 3',
            ],
            [
                'category_id' => 2,
                'text' => 'Word 4',
            ],
        ]);
    }
}
