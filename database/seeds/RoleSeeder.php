<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array(
            0 => 
            array(
                // 'id' => 0,
                'name' => 'Admin',
                'created_at' => now(),
                'updated_at' => now()
            ),
            1 => 
            array (
                // 'id' => 1,
                'name' => 'Customer',
                'created_at' => now(),
                'updated_at' => now()
            ),
            2 => 
            array (
                // 'id' => 2,
                'name' => 'Architect',
                'created_at' => now(),
                'updated_at' => now()
            ),
            3 => 
            array (
                // 'id' => 3,
                'name' => 'Supplier',
                'created_at' => now(),
                'updated_at' => now()
            )
        ));
    }
}
