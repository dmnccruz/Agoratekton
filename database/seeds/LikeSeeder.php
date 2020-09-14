<?php

use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('likes')->delete();
        
        \DB::table('likes')->insert(array(
            0 => 
            array(
                'id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 3
            ),

            1 => 
            array(
                'id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 6
            ),

            2 => 
            array(
                'id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 9
            ),

            3 => 
            array(
                'id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 7
            ),
        ));
    }
}