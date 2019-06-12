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
        DB::table('users')->insert([
            'name' =>  "Paul",
            'email' => 'Paul@gmail.com',
            'password' => bcrypt('123456'),
            ]);
        DB::table('users')->insert([
            'name' =>  "John",
            'email' => 'John@gmail.com',
            'password' => bcrypt('123456'),
            ]);
        DB::table('users')->insert([
            'name' =>  "Matt",
            'email' => 'Matt@gmail.com',
            'password' => bcrypt('123456'),
            ]);    
    }
}
