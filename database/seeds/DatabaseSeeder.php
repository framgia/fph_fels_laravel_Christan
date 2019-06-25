<?php

use Carbon\Carbon;
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
        DB::table('users')->insert([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'is_admin' => 1,
            'email' => 'admin@gmail.com',
            'created_at' => Carbon::now(),
            'password' => bcrypt('securepassword')
        ]);

        DB::table('users')->insert([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@gmail.com',
            'created_at' => Carbon::now(),
            'password' => bcrypt('securepassword')
        ]);

        DB::table('users')->insert([
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'email' => 'janedoe@gmail.com',
            'created_at' => Carbon::now(),
            'password' => bcrypt('securepassword')
        ]);

        DB::table('categories')->insert([
            [
                'title' => 'Seeded Project 1',
                'description' => 'Project Description',
                'created_at' => Carbon::now()
            ],
            [
                'title' => 'Seeded Project 2',
                'description' => 'Project Description',
                'created_at' => Carbon::now()
            ]
        ]);

        DB::table('words')->insert([
            [
                'category_id' => 1,
                'text' => 'Word 1',
                'created_at' => Carbon::now()
            ],
        ]);

        DB::table('choices')->insert([
            'word_id' => 1,
            'text' => 'Choice 1',
            'created_at' => Carbon::now(),
            'is_correct' =>1,
        ]);

        DB::table('choices')->insert([
            [
                'word_id' => 1,
                'text' => 'Choice 2',
                'created_at' => Carbon::now()
            ],
            [
                'word_id' => 1,
                'text' => 'Choice 3',
                'created_at' => Carbon::now()
            ],
            [
                'word_id' => 1,
                'text' => 'Choice 4',
                'created_at' => Carbon::now()
            ],
        ]);

        DB::table('lessons')->insert([
            [
                'category_id' => 1,
                'user_id' => 2,
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
