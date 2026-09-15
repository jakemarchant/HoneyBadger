<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $pages = [
            ['slug' => 'welcome', 'name' => 'Home'],
            ['slug' => 'cocktails', 'name' => 'Cocktails'],
            ['slug' => 'food', 'name' => 'Food'],
            ['slug' => 'coffee', 'name' => 'Coffee'],
            ['slug' => 'events', 'name' => 'Events'],
            ['slug' => 'happy_hour', 'name' => 'Happy Hour'],
            ['slug' => 'opening_party', 'name' => 'Opening Party'],
            ['slug' => 'story', 'name' => 'Our Story'],
            ['slug' => 'visit', 'name' => 'Visit'],
        ];

        foreach ($pages as $page) {
            Page::query()->firstOrCreate(['slug' => $page['slug']], $page);
        }
    }
}
