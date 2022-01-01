<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function index () {

        $posts = Post::latest()->get();

        if(request('search')){
            $posts = Post::latest()->filter(request('search'))->get();
        }

        return view('welcome', [
            'posts' => $posts
        ]);
    }
}
