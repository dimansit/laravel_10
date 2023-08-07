<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('news')->insert($this->getFakeData());
    }

    public function getFakeData()
    {
        $response = [];
        for ($i=0; $i < 40; $i++) {
            $response[] = [
                'title' => 'Новость  ' . $i,
                'author' => fake()->userName(),
                'description' => fake()->text(500),
                'create_at' => now(),
                'category_id' => rand(0,10),
                'source_id' => rand(0,10),
                'user_create_id' => 0
            ];
        }

        return $response;
    }
}
