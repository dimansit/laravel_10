<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('categories')->insert($this->getFakeData());
    }

    public function getFakeData()
    {
        $response = [];
        for ($i=0; $i <= 10; $i++) {
            $response[] = [
                'category' => 'Категория №' . $i,
                'create_at' => now(),
                'user_create_id' => rand(0,1000),
            ];
        }

        return $response;
    }
}
