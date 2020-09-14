<?php

use Illuminate\Database\Seeder;

class PaymentSchemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('payment_schemes')->delete();
        
        \DB::table('payment_schemes')->insert(array(
            0 => 
            array(
                'id' => 1,
                'name' => 'none',
                'created_at' => now(),
                'updated_at' => now()
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'perdiem',
                'created_at' => now(),
                'updated_at' => now()
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'fiftyfifty',
                'created_at' => now(),
                'updated_at' => now()
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'thirtysixtyten',
                'created_at' => now(),
                'updated_at' => now()
            )
        ));
    }
}
