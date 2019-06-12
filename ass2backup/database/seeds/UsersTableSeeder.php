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
            'name' => 'Paul',
            'email' => 'paul@a.org',
            'password' => bcrypt('1234'),
            'dob' => '18/03/1986',
            'image' => 'profile/panda.jpg',
        ]);
        
        DB::table('users')->insert([
            'name' => 'Bob',
            'email' => 'bob@a.org',
            'password' => bcrypt('1234'),
            'dob' => '12/05/1989',
            'image' => 'profile/panda1.jpg',
        ]);
        
        DB::table('users')->insert([
            'name' => 'John',
            'email' => 'john@a.org',
            'password' => bcrypt('1234'),
            'dob' => '1/10/1982',
            'image' => 'profile/panda2.jpg',
        ]);
        
        DB::table('users')->insert([
            'name' => 'Tom',
            'email' => 'tom@a.org',
            'password' => bcrypt('1234'),
            'dob' => '28/12/1994',
            'image' => 'profile/panda3.png',
        ]);
        
        DB::table('users')->insert([
            'name' => 'Bug',
            'email' => 'bug@a.org',
            'password' => bcrypt('1234'),
            'dob' => '22/02/1990',
            'image' => 'profile/panda6.jpg',
        ]);
        
        DB::table('users')->insert([
            'name' => 'James',
            'email' => 'james@a.org',
            'password' => bcrypt('1234'),
            'dob' => '29/01/1988',
            'image' => 'profile/panda4.jpg',
        ]);
        
        
        DB::table('users')->insert([
            'name' => 'Jen',
            'email' => 'jen@a.org',
            'password' => bcrypt('1234'),
            'dob' => '21/09/1993',
            'image' => 'profile/panda5.jpg',
        ]);
        
        DB::table('users')->insert([
            'name' => 'Jess',
            'email' => 'jess@a.org',
            'password' => bcrypt('1234'),
            'dob' => '14/03/1996',
            'image' => 'profile/panda7.jpg',
        ]);
        
        DB::table('users')->insert([
            'name' => 'Jack',
            'email' => 'jack@a.org',
            'password' => bcrypt('1234'),
            'dob' => '14/04/1946',
            'image' => 'profile/panda8.jpg',
        ]);
        
        DB::table('users')->insert([
            'name' => 'Don',
            'email' => 'don@a.org',
            'password' => bcrypt('1234'),
            'dob' => '6/12/2000',
            'image' => 'profile/panda9.jpg',
        ]);
    }
}