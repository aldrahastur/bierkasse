<?php

namespace Database\Seeders;

use App\Models\Page;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create('de_DE');

        $title = $faker->text(30);

        $page = [
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => $faker->text(), // password
        ];
        Page::insert($page);
    }
}
