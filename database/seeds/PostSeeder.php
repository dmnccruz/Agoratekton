<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('posts')->delete();
        
        \DB::table('posts')->insert(array(
            0 => 
            array(
                'id' => 1,
                'posttitle' => 'House 1',
                'created_at' => now(),
                'updated_at' => now(),
                'post_type_id' => 1,
                'coverPhoto' => 'images/projects/proj1.jpg',
                'photo1' => 'images/projects/proj1a.jpg',
                'photo2' => 'images/projects/proj1b.jpg',
                'photo3' => 'images/projects/proj1c.jpg',
                'summary' => 'This project is a humble house built in Billund for the current president of Lego.',
                'paragraph1' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris in aliquam neque. Sed imperdiet sem quam, nec sollicitudin ipsum porta a. Pellentesque in metus facilisis, pretium lectus ut, cursus tellus. Aenean sagittis ultricies justo, id bibendum lacus aliquam non. Integer ut justo blandit, facilisis tellus nec, lobortis dui. Vivamus congue eros scelerisque odio pharetra, eu vehicula nulla consequat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse eu arcu pretium, ullamcorper est et, ultricies turpis.',
                'paragraph2' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent viverra, eros et semper rhoncus, ligula tortor porta eros, sed rutrum nunc nibh et ante. Nam interdum eros non ligula tincidunt auctor. Aliquam imperdiet urna eu purus dapibus, ac congue nibh faucibus. Ut maximus faucibus metus sit amet placerat. Duis quis ante eget tellus posuere congue et sed justo. Donec sit amet eros nec augue malesuada pellentesque. Donec tempor lacinia lorem at interdum. Pellentesque ultrices eros ut libero tincidunt, vel dignissim mauris euismod. Fusce velit purus, lobortis at lobortis sit amet, vulputate a nunc. Quisque eu eros vestibulum, interdum sem ac, tristique metus. Aenean vel tincidunt risus. Pellentesque aliquet vestibulum diam.',
                'projectType' => 'Residential',
                'latitude' => '14.5547',
                'longitude' =>  '121.0244',
                'area' =>  '439sqm',
                'likeCount' => 0,
            ),

            1 => 
            array(
                'id' => 2,
                'posttitle' => 'House 2',
                'created_at' => now(),
                'updated_at' => now(),
                'post_type_id' => 1,
                'coverPhoto' => 'images/projects/proj2.jpg',
                'photo1' => 'images/projects/proj2a.jpg',
                'photo2' => 'images/projects/proj2b.jpg',
                'photo3' => 'images/projects/proj2c.jpg',
                'summary' => 'Wow this building is different.',
                'paragraph1' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris in aliquam neque. Sed imperdiet sem quam, nec sollicitudin ipsum porta a. Pellentesque in metus facilisis, pretium lectus ut, cursus tellus. Aenean sagittis ultricies justo, id bibendum lacus aliquam non. Integer ut justo blandit, facilisis tellus nec, lobortis dui. Vivamus congue eros scelerisque odio pharetra, eu vehicula nulla consequat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse eu arcu pretium, ullamcorper est et, ultricies turpis.',
                'paragraph2' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent viverra, eros et semper rhoncus, ligula tortor porta eros, sed rutrum nunc nibh et ante. Nam interdum eros non ligula tincidunt auctor. Aliquam imperdiet urna eu purus dapibus, ac congue nibh faucibus. Ut maximus faucibus metus sit amet placerat. Duis quis ante eget tellus posuere congue et sed justo. Donec sit amet eros nec augue malesuada pellentesque. Donec tempor lacinia lorem at interdum. Pellentesque ultrices eros ut libero tincidunt, vel dignissim mauris euismod. Fusce velit purus, lobortis at lobortis sit amet, vulputate a nunc. Quisque eu eros vestibulum, interdum sem ac, tristique metus. Aenean vel tincidunt risus. Pellentesque aliquet vestibulum diam.',
                'projectType' => 'commercial',
                'latitude' => '12.21',
                'longitude' =>  '99.265',
                'area' =>  '220sqm',
                'likeCount' => 0,
            ),

            2 => 
            array(
                'id' => 3,
                'posttitle' => 'Looking for wood supplier',
                'created_at' => now(),
                'updated_at' => now(),
                'post_type_id' => 2,
                'coverPhoto' => 'images/jobs/job1.jpg',
                'photo1' => NULL,
                'photo2' => NULL,
                'photo3' => NULL,
                'summary' => 'lookig for good wood supplier thanks',
                'paragraph1' => NULL,
                'paragraph2' => NULL,
                'projectType' => NULL,
                'latitude' => NULL,
                'longitude' =>  NULL,
                'area' =>  NULL,
                'likeCount' => 0,
            ),       

            3 => 
            array(
                'id' => 4,
                'posttitle' => 'Need CHB supplier',
                'created_at' => now(),
                'updated_at' => now(),
                'post_type_id' => 2,
                'coverPhoto' => 'images/jobs/job2.jpg',
                'photo1' => NULL,
                'photo2' => NULL,
                'photo3' => NULL,
                'summary' => 'best price please',
                'paragraph1' => NULL,
                'paragraph2' => NULL,
                'projectType' => NULL,
                'latitude' => NULL,
                'longitude' =>  NULL,
                'area' =>  NULL,
                'likeCount' => 0,
            ),  
            
            4 => 
            array(
                'id' => 5,
                'posttitle' => 'Selling gabions',
                'created_at' => now(),
                'updated_at' => now(),
                'post_type_id' => 3,
                'coverPhoto' => 'images/products/prod1.jpg',
                'photo1' => NULL,
                'photo2' => NULL,
                'photo3' => NULL,
                'summary' => 'pm me',
                'paragraph1' => NULL,
                'paragraph2' => NULL,
                'projectType' => NULL,
                'latitude' => NULL,
                'longitude' =>  NULL,
                'area' =>  NULL,
                'likeCount' => 0,
            ),  

            5 => 
            array(
                'id' => 6,
                'posttitle' => 'benta wood',
                'created_at' => now(),
                'updated_at' => now(),
                'post_type_id' => 3,
                'coverPhoto' => 'images/products/prod2.jpg',
                'photo1' => NULL,
                'photo2' => NULL,
                'photo3' => NULL,
                'summary' => 'best price please',
                'paragraph1' => NULL,
                'paragraph2' => NULL,
                'projectType' => NULL,
                'latitude' => NULL,
                'longitude' =>  NULL,
                'area' =>  NULL,
                'likeCount' => 0,
            ),  

            6 => 
            array(
                'id' => 7,
                'posttitle' => 'marble kayo dyan',
                'created_at' => now(),
                'updated_at' => now(),
                'post_type_id' => 3,
                'coverPhoto' => 'images/products/prod3.jpg',
                'photo1' => NULL,
                'photo2' => NULL,
                'photo3' => NULL,
                'summary' => 'pa mine nalang po',
                'paragraph1' => NULL,
                'paragraph2' => NULL,
                'projectType' => NULL,
                'latitude' => NULL,
                'longitude' =>  NULL,
                'area' =>  NULL,
                'likeCount' => 0,
            ),  

            7 => 
            array(
                'id' => 8,
                'posttitle' => 'wholesale electrical wires!!!',
                'created_at' => now(),
                'updated_at' => now(),
                'post_type_id' => 3,
                'coverPhoto' => 'images/products/prod4.jpg',
                'photo1' => NULL,
                'photo2' => NULL,
                'photo3' => NULL,
                'summary' => 'pili na po',
                'paragraph1' => NULL,
                'paragraph2' => NULL,
                'projectType' => NULL,
                'latitude' => NULL,
                'longitude' =>  NULL,
                'area' =>  NULL,
                'likeCount' => 0,
            ),  

            8 => 
            array(
                'id' => 9,
                'posttitle' => 'Looking for cement mixer',
                'created_at' => now(),
                'updated_at' => now(),
                'post_type_id' => 2,
                'coverPhoto' => 'images/jobs/job3.jpg',
                'photo1' => NULL,
                'photo2' => NULL,
                'photo3' => NULL,
                'summary' => 'rush thanks',
                'paragraph1' => NULL,
                'paragraph2' => NULL,
                'projectType' => NULL,
                'latitude' => NULL,
                'longitude' =>  NULL,
                'area' =>  NULL,
                'likeCount' => 0,
            ),  

            9 => 
            array(
                'id' => 10,
                'posttitle' => 'House 5',
                'created_at' => now(),
                'updated_at' => now(),
                'post_type_id' => 1,
                'coverPhoto' => 'images/projects/proj4.jpg',
                'photo1' => 'images/projects/proj4a.jpg',
                'photo2' => 'images/projects/proj4b.jpg',
                'photo3' => 'images/projects/proj4c.jpg',
                'summary' => 'This is the best house in town. Check it out now!',
                'paragraph1' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris in aliquam neque. Sed imperdiet sem quam, nec sollicitudin ipsum porta a. Pellentesque in metus facilisis, pretium lectus ut, cursus tellus. Aenean sagittis ultricies justo, id bibendum lacus aliquam non. Integer ut justo blandit, facilisis tellus nec, lobortis dui. Vivamus congue eros scelerisque odio pharetra, eu vehicula nulla consequat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse eu arcu pretium, ullamcorper est et, ultricies turpis.',
                'paragraph2' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent viverra, eros et semper rhoncus, ligula tortor porta eros, sed rutrum nunc nibh et ante. Nam interdum eros non ligula tincidunt auctor. Aliquam imperdiet urna eu purus dapibus, ac congue nibh faucibus. Ut maximus faucibus metus sit amet placerat. Duis quis ante eget tellus posuere congue et sed justo. Donec sit amet eros nec augue malesuada pellentesque. Donec tempor lacinia lorem at interdum. Pellentesque ultrices eros ut libero tincidunt, vel dignissim mauris euismod. Fusce velit purus, lobortis at lobortis sit amet, vulputate a nunc. Quisque eu eros vestibulum, interdum sem ac, tristique metus. Aenean vel tincidunt risus. Pellentesque aliquet vestibulum diam.',
                'projectType' => 'Residential',
                'latitude' => '14.5547',
                'longitude' =>  '121.0244',
                'area' =>  '439sqm',
                'likeCount' => 0,
            ),

            10 => 
            array(
                'id' => 11,
                'posttitle' => 'House 7',
                'created_at' => now(),
                'updated_at' => now(),
                'post_type_id' => 1,
                'coverPhoto' => 'images/projects/proj5.jpg',
                'photo1' => 'images/projects/proj5a.jpg',
                'photo2' => 'images/projects/proj5b.jpg',
                'photo3' => 'images/projects/proj5c.jpg',
                'summary' => 'Newly designed house up for selling. Thank you!',
                'paragraph1' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris in aliquam neque. Sed imperdiet sem quam, nec sollicitudin ipsum porta a. Pellentesque in metus facilisis, pretium lectus ut, cursus tellus. Aenean sagittis ultricies justo, id bibendum lacus aliquam non. Integer ut justo blandit, facilisis tellus nec, lobortis dui. Vivamus congue eros scelerisque odio pharetra, eu vehicula nulla consequat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse eu arcu pretium, ullamcorper est et, ultricies turpis.',
                'paragraph2' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent viverra, eros et semper rhoncus, ligula tortor porta eros, sed rutrum nunc nibh et ante. Nam interdum eros non ligula tincidunt auctor. Aliquam imperdiet urna eu purus dapibus, ac congue nibh faucibus. Ut maximus faucibus metus sit amet placerat. Duis quis ante eget tellus posuere congue et sed justo. Donec sit amet eros nec augue malesuada pellentesque. Donec tempor lacinia lorem at interdum. Pellentesque ultrices eros ut libero tincidunt, vel dignissim mauris euismod. Fusce velit purus, lobortis at lobortis sit amet, vulputate a nunc. Quisque eu eros vestibulum, interdum sem ac, tristique metus. Aenean vel tincidunt risus. Pellentesque aliquet vestibulum diam.',
                'projectType' => 'Residential',
                'latitude' => '14.5547',
                'longitude' =>  '121.0244',
                'area' =>  '439sqm',
                'likeCount' => 0,
            ),
            
            
        ));
    }
}
