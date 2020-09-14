<?php

use Illuminate\Database\Seeder;

class ContributionPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('contribution_post')->delete();
        
        \DB::table('contribution_post')->insert(array(
            0 => 
            array(
                'id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'post_id' => 1,
                'contribution_id' => 1
            ),

            1 => 
            array(
                'id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
                'post_id' => 1,
                'contribution_id' => 2
            ),

            2 => 
            array(
                'id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
                'post_id' => 1,
                'contribution_id' => 3
            ),

            3 => 
            array(
                'id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
                'post_id' => 2,
                'contribution_id' => 4
            ),
            
            
        ));
    }
}
