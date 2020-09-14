<?php

use Illuminate\Database\Seeder;

class PostReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('post_report')->delete();
        
        \DB::table('post_report')->insert(array(
            0 => 
            array(
                'id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'post_id' => 1,
                'report_id' => 1
            ),

            1 => 
            array(
                'id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
                'post_id' => 3,
                'report_id' => 2
            ),

            2 => 
            array(
                'id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
                'post_id' => 7,
                'report_id' => 3
            ),
        ));
    }
}
