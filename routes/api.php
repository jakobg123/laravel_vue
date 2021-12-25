<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('sak', [["val" => "something"]]);

Route::get('sak', function () {
    return ["val" => "something", "turtle_1" => "Michaelangelo", "turtle_2" => "Donatello", "turtle_3" => "Raphael", "turtle_4" => "Leonardo"];
});


Route::get('posts', function () {
    // $test = Post::all(); 
    // $stuff = [];
    // foreach(Post::all() as $item){
    //     $item['category'] = $item->category;
    //     $test[] = $item;
    //     // $stuff[] = ['category' => $item->category, 'post' => $item];
    // }

    // return collect($test);    
    return Post::with('category', 'author')->get();    
});

Route::get('users', function () {
    return User::all();    
});

Route::get('authors/{author:username}', function(User $author){
    return User::with('posts')->findOrFail($author->id);   
});