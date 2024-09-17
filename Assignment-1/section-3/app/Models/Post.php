<?php

namespace App\Models;
use Illuminate\Support\Arr;

class Post{
    public static function all(){
        return [
            ['id' => 1, 'slug' => 'judul-artikel-1', 'title' => 'Judul Post 1', 'author' => 'Farah', 'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veniam asperiores neque sed nam excepturi laborum ad officia. Iure tempore eaque quisquam dicta, nemo temporibus vero ratione blanditiis odio veniam voluptates.'],
            ['id' => 2, 'slug' => 'judul-artikel-2', 'title' => 'Judul Post 2', 'author' => 'Dhiaf', 'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veniam asperiores neque sed nam excepturi laborum ad officia. Iure tempore eaque quisquam dicta, nemo temporibus vero ratione blanditiis odio veniam voluptates.'],
            ['id' => 3, 'slug' => 'judul-artikel-3', 'title' => 'Judul Post 3', 'author' => 'Farah Dhiaf', 'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veniam asperiores neque sed nam excepturi laborum ad officia. Iure tempore eaque quisquam dicta, nemo temporibus vero ratione blanditiis odio veniam voluptates.']
        ];
    }

    public static function find($slug):array{
        // return Arr::first(static::all(), function($post) use ($slug){
        //     return $post['slug'] == $slug;
        // });

        // teknik arrow function yg bisa digunakan untuk menggantikan function di atas
        $post = Arr::first(static::all(), fn($post) => $post['slug'] == $slug);

        if(!$post){
            abort(404);
        }

        return $post;
    }
}