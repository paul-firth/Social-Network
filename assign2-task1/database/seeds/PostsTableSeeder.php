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
            'name' => 'Paul',
            'title' => 'My Post',
            'message' => 'This is a post',
            'num_com' => '2',
        ]);

        DB::table('posts')->insert([
            'name' => 'Paul',
            'title' => 'Another Post',
            'message' => 'This is another post',
            'num_com' => '0',
        ]);
        
        DB::table('posts')->insert([
            'name' => 'Paul',
            'title' => 'Tribute',
            'message' => 'This is not another post, this is a tribute',
            'num_com' => '1',
        ]);
        
    }
}
