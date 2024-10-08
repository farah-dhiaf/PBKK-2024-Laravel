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
            'color'=> 'red',
        ]);

        Category::create([
            'name'=> 'Web Development',
            'slug'=> 'web-development',
            'color'=> 'blue',
        ]);

        Category::create([
            'name'=> 'Mobile Development',
            'slug'=> 'mobile-development',
            'color'=> 'green',
        ]);
        Category::create([
            'name'=> 'Digital Marketing',
            'slug'=> 'digital-marketing',
            'color'=> 'yellow',
        ]);
    }
}
