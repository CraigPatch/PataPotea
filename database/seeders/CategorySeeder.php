<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Simu na Elektroniki',     'slug' => 'simu-na-elektroniki', 'icon' => '📱'],
            ['name' => 'Pochi na Mikoba',          'slug' => 'pochi-na-mikoba',     'icon' => '👜'],
            ['name' => 'Vitambulisho na Nyaraka',  'slug' => 'vitambulisho',        'icon' => '🪪'],
            ['name' => 'Funguo',                   'slug' => 'funguo',              'icon' => '🔑'],
            ['name' => 'Mavazi',                   'slug' => 'mavazi',              'icon' => '👕'],
            ['name' => 'Vitu vya Dhamani',         'slug' => 'vitu-vya-dhamani',    'icon' => '💍'],
            ['name' => 'Vitabu na Shule',          'slug' => 'vitabu-na-shule',     'icon' => '📚'],
            ['name' => 'Nyinginezo',               'slug' => 'nyinginezo',          'icon' => '📦'],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }
    }
}