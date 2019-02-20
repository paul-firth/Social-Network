<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'user' => '1',
            'name' => 'Paul',
            'message' => 'This is a comment',
            'id' => '1',
        ]);

        DB::table('comments')->insert([
            'user' => '2',
            'name' => 'Bob',
            'message' => 'This is a another comment',
            'id' => '1',
        ]);
        
        DB::table('comments')->insert([
            'user' => '3',
            'name' => 'John',
            'message' => 'This is not another comment, this is a tribute',
            'id' => '3',
        ]);
    }
}
