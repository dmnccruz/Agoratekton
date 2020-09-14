<?php

use Illuminate\Database\Seeder;

class PostTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('post_types')->delete();
        
        \DB::table('post_types')->insert(array(
            0 => 
            array(
                'id' => 1,
                'name' => 'Project',
                'created_at' => now(),
                'updated_at' => now()
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Job',
                'created_at' => now(),
                'updated_at' => now()
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Product',
                'created_at' => now(),
                'updated_at' => now()
            ),
        ));
    }
}
