<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        function generateRandomString($length = 3) {
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array(
            0 => 
            array(
                'id' => 1,
                'name' => 'user1',
                'email' => 'user1@gmail.com',
                'password' => Hash::make('asdasdasd'),
                'meetingid' => generateRandomString()."-".generateRandomString()."-".generateRandomString(),
                'created_at' => now(),
                'updated_at' => now(),
                'role_id' => 1,
                'rating' => '3',
            ),

            1 => 
            array(
                'id' => 2,
                'name' => 'user2',
                'email' => 'user2@gmail.com',
                'password' => Hash::make('asdasdasd'),
                'meetingid' => generateRandomString()."-".generateRandomString()."-".generateRandomString(),
                'created_at' => now(),
                'updated_at' => now(),
                'role_id' => 2,
                'rating' => '0',
            ),

            2 => 
            array(
                'id' => 3,
                'name' => 'user3',
                'email' => 'user3@gmail.com',
                'password' => Hash::make('asdasdasd'),
                'meetingid' => generateRandomString()."-".generateRandomString()."-".generateRandomString(),
                'created_at' => now(),
                'updated_at' => now(),
                'role_id' => 2,
                'rating' => '3',
            ),

            3 => 
            array(
                'id' => 4,
                'name' => 'archi1',
                'email' => 'archi1@gmail.com',
                'password' => Hash::make('asdasdasd'),
                'meetingid' => generateRandomString()."-".generateRandomString()."-".generateRandomString(),
                'created_at' => now(),
                'updated_at' => now(),
                'role_id' => 3,
                'rating' => '0',
            ),

            4 => 
            array(
                'id' => 5,
                'name' => 'archi2',
                'email' => 'archi2@gmail.com',
                'password' => Hash::make('asdasdasd'),
                'meetingid' => generateRandomString()."-".generateRandomString()."-".generateRandomString(),
                'created_at' => now(),
                'updated_at' => now(),
                'role_id' => 3,
                'rating' => '5',
            ),

            5 => 
            array(
                'id' => 6,
                'name' => 'archi3',
                'email' => 'archi3@gmail.com',
                'password' => Hash::make('asdasdasd'),
                'meetingid' => generateRandomString()."-".generateRandomString()."-".generateRandomString(),
                'created_at' => now(),
                'updated_at' => now(),
                'role_id' => 3,
                'rating' => '4',
            ),

            6 => 
            array(
                'id' => 7,
                'name' => 'supplier1',
                'email' => 'supplier1@gmail.com',
                'password' => Hash::make('asdasdasd'),
                'meetingid' => generateRandomString()."-".generateRandomString()."-".generateRandomString(),
                'created_at' => now(),
                'updated_at' => now(),
                'role_id' => 3,
                'rating' => '0',
            ),

            7 => 
            array(
                'id' => 8,
                'name' => 'supplier2',
                'email' => 'supplier2@gmail.com',
                'password' => Hash::make('asdasdasd'),
                'meetingid' => generateRandomString()."-".generateRandomString()."-".generateRandomString(),
                'created_at' => now(),
                'updated_at' => now(),
                'role_id' => 3,
                'rating' => '3',
            ),

            8 => 
            array(
                'id' => 9,
                'name' => 'supplier3',
                'email' => 'supplier3@gmail.com',
                'password' => Hash::make('asdasdasd'),
                'meetingid' => generateRandomString()."-".generateRandomString()."-".generateRandomString(),
                'created_at' => now(),
                'updated_at' => now(),
                'role_id' => 3,
                'rating' => '0',
            ),

            9 => 
            array(
                'id' => 10,
                'name' => 'michael jordan',
                'email' => 'mj@mj.com',
                'password' => Hash::make('asdasdasdasd'),
                'meetingid' => generateRandomString()."-".generateRandomString()."-".generateRandomString(),
                'created_at' => now(),
                'updated_at' => now(),
                'role_id' => 2,
                'rating' => '0',
            ),

            10 => 
            array(
                'id' => 11,
                'name' => 'kobe bryant',
                'email' => 'kob@kob.com',
                'password' => Hash::make('asdasdasd'),
                'meetingid' => generateRandomString()."-".generateRandomString()."-".generateRandomString(),
                'created_at' => now(),
                'updated_at' => now(),
                'role_id' => 3,
                'rating' => '0',
            ),

            11 => 
            array(
                'id' => 12,
                'name' => 'lebron james',
                'email' => 'lbj@lbj.com',
                'password' => Hash::make('asdasdasd'),
                'meetingid' => generateRandomString()."-".generateRandomString()."-".generateRandomString(),
                'created_at' => now(),
                'updated_at' => now(),
                'role_id' => 3,
                'rating' => '0',
            ),

        ));
    }
}
