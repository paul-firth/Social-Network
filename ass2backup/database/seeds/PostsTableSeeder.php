<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'user' => '1',
            'name' => 'Paul',
            'title' => 'My Post',
            'message' => 'This is a post',
            'num_com' => '2',
        ]);

        DB::table('posts')->insert([
            'user' => '2',
            'name' => 'Bob',
            'title' => 'Another Post',
            'message' => 'This is another post',
            'num_com' => '0',
        ]);
        
        DB::table('posts')->insert([
            'user' => '3',
            'name' => 'John',
            'title' => 'Tribute',
            'message' => 'This is not another post, this is a tribute',
            'num_com' => '1',
        ]);
        
        DB::table('posts')->insert([
            'user' => '1',
            'name' => 'Paul',
            'title' => 'New Post',
            'message' => 'This is not another post, its a new one.',
            'num_com' => '0',
        ]);
        
        
    }
}
