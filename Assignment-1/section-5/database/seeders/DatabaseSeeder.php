<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;
use PhpParser\Node\Stmt\UseUse;
use App\Models\Post;
use App\Models\User;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([CategorySeeder::class, UserSeeder::class]);
        Post::factory(30)->recycle([
            Category::all(),
            User::all(),
        ])->create();
    }

}
