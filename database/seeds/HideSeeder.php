<?php

use Illuminate\Database\Seeder;

class HideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('hides')->delete();
        
        \DB::table('hides')->insert(array(
            0 => 
            array(
                'id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 1,
                'post_id' => 2,
            ),
            1 => 
            array (
                'id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 3,
                'post_id' => 5,
            ),
            2 => 
            array (
                'id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 1,
                'post_id' => 3,
            ),
            3 => 
            array (
                'id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 1,
                'post_id' => 4,
            ),
        ));
    }
}
