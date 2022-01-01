<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Http\Controllers\PostController;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/category', function () {
    \Illuminate\Support\Facades\DB::listen(function($query){
        logger($query->sql, $query->bindings);
    });

    return view('categories', [
        'posts' => Category::with('posts')->get()
    ]);
});

Route::get('/category/{category:slug}', function (Category $category) {
    return view('category', [
        'post' => $category
    ]);
});

// Route::get('/hej', function () {
//     // dd(request('search'));
//     @dump("hejsadasjjj");
//     return view('welcome2');
// });

Route::get('/{any?}', [PostController::class, 'index']);
// Route::get('/{any?}', function () {
//     $posts = Post::all();
//     if(request('search')){
//         return view('welcome2', [PostController::class, 'index']);
//     }

//     return view('welcome', [
//         'posts' => $posts
//     ]);
// });



// Route::get('user', 'UserController@index')->name('user');
// Route::get('/{any?}', function () {
//     // dd(request('search'));
//     return view('welcome');
// });

// Route::get('/authors/{any?}', function () {
//     return view('welcome');
// });
