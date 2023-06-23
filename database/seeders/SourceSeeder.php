<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('source')->insert($this->getFakeData());
    }

    public function getFakeData()
    {
        $response = [];
        for ($i=0; $i <= 10; $i++) {
            $response[] = [
                'name' => fake()->userName(),
                'description' => fake()->text(500),
                'url' => fake()->url(),
                'create_at' => now(),
                'user_create_id' => 0
            ];
        }

        return $response;
    }
}
