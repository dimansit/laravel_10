<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $news = [];

    public function createNews(): void
    {
        $faker = Factory::create();
        $categories = $this->getCategories();
        $keysCategory = array_keys($categories);
        for ($i = 1; $i < 20; $i++) {
            $this->news[$i] = [
                'title'       => $faker->jobTitle(),
                'author'      => $faker->userName(),
                'description' => $faker->text(100),
                'create_at'   => now(),
                'category'    => $keysCategory[array_rand($keysCategory, 1)]
            ];
        }
    }

    public function getNews(int $id = null): array
    {
        $this->createNews();

        if ($id != null)
            return $this->news[$id];
        return $this->news;
    }

    public function getCategories(): array
    {
        return [
            1 => 'Транспорт',
            'Происшествия',
            'Финансы',
            'В мире',
            'Погода'
        ];
    }

    public function getNewsFromCategory($categoryId): array
    {
        $this->createNews();
        $newsCategory = [];
        foreach ($this->news as $news) {
            if ($news['category'] == $categoryId) {
                $newsCategory[] = $news;
            }
        }

        return $newsCategory;
    }

}
