<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Storage::disk('public')
        // ->put($input['photo']
        // ->getClientOriginalName(), file_get_contents($input['photo']));

        // $image =  file_get_contents('images/')->store('public/categories');
        Category::create([
            'name' => 'Specials',
            'image' => 'public/categories/specials.jpg',
            'description' => 'Special dishes are updated every day, a variety of steaks and drinks'
        ]);
        Category::create([
            'name' => 'Beverages',
            'image' => 'public/categories/beverages.webp',
            'description' => 'Beverages including wines and fresh fruit'
        ]);
        Category::create([
            'name' => 'Beef steak',
            'image' => 'public/categories/beef_steak.avif',
            'description' => 'Beverages including wines and fresh fruit'
        ]);
    }
}
