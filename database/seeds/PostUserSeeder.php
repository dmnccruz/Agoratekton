<?php

use Illuminate\Database\Seeder;

class PostUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('post_user')->delete();
        
        \DB::table('post_user')->insert(array(
            0 => 
            array(
                'id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'post_id' => 1,
                'user_id' => 4
            ),
            1 => 
            array(
                'id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
                'post_id' => 2,
                'user_id' => 5
            ),
            2 => 
            array(
                'id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
                'post_id' => 3,
                'user_id' => 2
            ),

            3 => 
            array(
                'id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
                'post_id' => 4,
                'user_id' => 1
            ),

            4 => 
            array(
                'id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
                'post_id' => 5,
                'user_id' => 9
            ),

            5 => 
            array(
                'id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
                'post_id' => 6,
                'user_id' => 7
            ),

            6 => 
            array(
                'id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
                'post_id' => 7,
                'user_id' => 8
            ),

            7 => 
            array(
                'id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
                'post_id' => 8,
                'user_id' => 3
            ),

            8 => 
            array(
                'id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
                'post_id' => 9,
                'user_id' => 9
            ),

            9 => 
            array(
                'id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
                'post_id' => 10,
                'user_id' => 4
            ),

            10 => 
            array(
                'id' => 11,
                'created_at' => now(),
                'updated_at' => now(),
                'post_id' => 11,
                'user_id' => 6
            ),
            
        ));
    }
}
