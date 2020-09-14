<?php

use Illuminate\Database\Seeder;

class LikePostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('like_post')->delete();
        
        \DB::table('like_post')->insert(array(
            0 => 
            array(
                'id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'post_id' => 1,
                'like_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
                'post_id' => 1,
                'like_id' => 2,
            ),
            2 => 
            array (
                'id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
                'post_id' => 2,
                'like_id' => 3,
            ),
            3 => 
            array (
                'id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
                'post_id' => 3,
                'like_id' => 4,
            ),
        ));
    }
}
