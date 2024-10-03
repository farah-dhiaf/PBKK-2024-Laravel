<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Category::factory(3)->create();
        Category::create([
            'name'=> 'Web Design',
            'slug'=> 'web-design',
        ]);

        Category::create([
            'name'=> 'Web Development',
            'slug'=> 'web-development',
        ]);

        Category::create([
            'name'=> 'Mobile Development',
            'slug'=> 'mobile-development',
        ]);
        Category::create([
            'name'=> 'Digital Marketing',
            'slug'=> 'digital-marketing',
        ]);
    }
}
