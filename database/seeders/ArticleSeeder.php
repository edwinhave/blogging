<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 25; $i++) {
            $title = $faker->sentence(6);
            $body = $faker->paragraphs(5, true);
            $image = $faker->imageUrl(800, 600, 'animals', true);
            $views = $faker->numberBetween(0, 100);
            $created_at = $faker->dateTimeBetween('-3 months', 'now');

            DB::table('articles')->insert([
                'title' => $title,
                'body' => $body,
                'image' => $image,
                'views' => $views,
                'published_at' => $created_at,
                'created_at' => $created_at,
                'updated_at' => $created_at
            ]);
        };
    }
}
