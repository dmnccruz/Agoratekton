<?php

use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('reports')->delete();
        
        \DB::table('reports')->insert(array(
            0 => 
            array(
                'id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 6,
                'reportbody' => 'bitch!'
            ),
            1 => 
            array (
                'id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 8,
                'reportbody' => 'ew!'
            ),
            2 => 
            array (
                'id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 2,
                'reportbody' => 'yuck!'
            ),
        ));
    }
}
