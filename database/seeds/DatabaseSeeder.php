<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call([
        //     RoleSeeder::class
        // ]);
        // $this->call([
        //     UserSeeder::class
        // ]);
        // $this->call([
        //     PostTypeSeeder::class
        // ]);
        $this->call([
            PaymentSchemeSeeder::class
        ]);
        // $this->call([
        //     PostSeeder::class
        // ]);
        $this->call([
            PostUserSeeder::class
        ]);
        // $this->call([
        //     CommentSeeder::class
        // ]);
        // $this->call([
        //     CommentPostSeeder::class
        // ]);
        // $this->call([
        //     LikeSeeder::class
        // ]);
        // $this->call([
        //     LikePostSeeder::class
        // ]);
        $this->call([
            ContributionSeeder::class
        ]);
        $this->call([
            ContributionPostSeeder::class
        ]);
        $this->call([
            ReportSeeder::class
        ]);
        $this->call([
            PostReportSeeder::class
        ]);
        // $this->call([
        //     HideSeeder::class
        // ]);
    }
}
