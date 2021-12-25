<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;

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

Route::get('/{any?}', function () {
    return view('welcome');
});

// Route::get('/authors/{any?}', function () {
//     return view('welcome');
// });
