<?php

use Illuminate\Database\Seeder;

class CommentPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('comment_post')->delete();
        
        \DB::table('comment_post')->insert(array(
            0 => 
            array(
                'id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'post_id' => 1,
                'comment_id' => 1
            ),

            1 => 
            array(
                'id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
                'post_id' => 1,
                'comment_id' => 2
            ),

            2 => 
            array(
                'id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
                'post_id' => 1,
                'comment_id' => 3
            ),

            3 => 
            array(
                'id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
                'post_id' => 2,
                'comment_id' => 4
            ),

            4 => 
            array(
                'id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
                'post_id' => 3,
                'comment_id' => 5
            ),

            5 => 
            array(
                'id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
                'post_id' => 3,
                'comment_id' => 6
            ),

            6 => 
            array(
                'id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
                'post_id' => 4,
                'comment_id' => 7
            ),

            7 => 
            array(
                'id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
                'post_id' => 5,
                'comment_id' => 8
            ),

            8 => 
            array(
                'id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
                'post_id' => 6,
                'comment_id' => 9
            ),

            9 => 
            array(
                'id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
                'post_id' => 3,
                'comment_id' => 10
            ),
        ));
    }
}
