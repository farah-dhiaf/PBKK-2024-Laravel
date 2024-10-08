<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Models\Post;
use App\Models\User;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About Page', 'nama' => 'Farah']);
});

// untuk menampilkan keseluruhan data posts

Route::get('/posts', function () {
    // dump(request('search'));
    // $posts = Post::latest();
    // if (request('search')) {
    //     $posts->where('title', 'like', '%' . request('search') . '%');
    // }
    // $posts = Post::with(['author', 'category'])->latest()->get(); //eager loading
    // akan menampilkan semua data yang ada di dalam kelas Post yang ada di dalam method all
    return view('posts', ['title' => 'Blog', 'posts' =>Post::filter(request(['search', 'category', 'author']))->latest()->paginate(6)->withQueryString()]);
});

// wild card untuk mengakses data spesifik (post yang singular)
// beban pencarian data tidak lagi di controller, melainkan di dalam model
Route::get('/posts/{post:slug}', function (Post $post) {
    // $post = Post::find($slug);
    
    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/authors/{user:username}', function (User $user) {
    // $post = Post::find($slug);
    // $posts = $user->posts->load(['author', 'category']);
    
    return view('posts', ['title' => count($user->posts) . ' Articles by ' . $user->name, 'posts' => $user->posts]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    // $post = Post::find($slug);
    // $posts = $category->posts->load(['author', 'category']);
    
    return view('posts', ['title' => 'Articles in: ' . $category->name, 'posts' =>  $category->posts]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Page', 'github' => 'farah-dhiaf']);
});


