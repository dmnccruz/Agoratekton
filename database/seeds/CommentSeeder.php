<?php

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('comments')->delete();
        
        \DB::table('comments')->insert(array(
            0 => 
            array(
                'id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 3,
                'commentbody' => 'nice work!'
            ),
            1 => 
            array (
                'id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 2,
                'commentbody' => 'hm po!'
            ),
            2 => 
            array (
                'id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 7,
                'commentbody' => 'good job!'
            ),
            3 => 
            array (
                'id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 1,
                'commentbody' => 'WOW!'
            ),
            4 => 
            array (
                'id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 8,
                'commentbody' => 'pm me po'
            ),
            5 => 
            array (
                'id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 9,
                'commentbody' => 'interested'
            ),

            6 => 
            array (
                'id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 7,
                'commentbody' => 'pm sent'
            ),

            7 => 
            array (
                'id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 2,
                'commentbody' => 'im interested powz'
            ),

            8 => 
            array (
                'id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 3,
                'commentbody' => 'mine'
            ),

            9 => 
            array (
                'id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 7,
                'commentbody' => 'amaing job'
            ),
        ));
    }
}
