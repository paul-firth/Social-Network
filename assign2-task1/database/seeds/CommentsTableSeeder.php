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
            'name' => 'Paul',
            'message' => 'This is a comment',
            'id' => '1',
        ]);

        DB::table('comments')->insert([
            'name' => 'Paul',
            'message' => 'This is a another comment',
            'id' => '1',
        ]);
        
        DB::table('comments')->insert([
            'name' => 'Paul',
            'message' => 'This is not another comment, this is a tribute',
            'id' => '3',
        ]);
    }
}
