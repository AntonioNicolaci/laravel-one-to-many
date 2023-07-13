<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\work;

class WorksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 50; $i++)
        {
            $img_one = null;
            $img_two = null;
            $img_three = null;
            $desc = null;
            if (rand(0,1) == 0) //img_one
            {
                $img_one = 'https://picsum.photos/id/'. rand(0, 1084) . '/300/300';
            };
            if (rand(0,1) == 0) //img_two
            {
                $img_two = 'https://picsum.photos/id/'. rand(0, 1084) . '/300/300';
            };
            if (rand(0,1) == 0) //img_three
            {
                $img_three = 'https://picsum.photos/id/'. rand(0, 1084) . '/300/300';
            };

            if (rand(0, 1) == 0) //desc
            {
                $desc = $faker->words(rand(60, 120),true);
            };
        
            Work::create([
                'title' => $faker->words(rand(2, 5), true),
                'image_large' => 'https://picsum.photos/id/'. rand(0, 1084) . '/300/300',
                'image_secondary_one' => $img_one,
                'image_secondary_two' => $img_two,
                'image_secondary_three' => $img_three,
                'link' => '#',
                'github' => 'https://github.com/AntonioNicolaci/',
                'description' => $desc,
                'short_description' => $faker->words(rand(10, 11),true),
            ]);
        }
    }
}
