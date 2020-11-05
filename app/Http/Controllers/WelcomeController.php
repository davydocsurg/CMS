<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;

class WelcomeController extends Controller
{
    public function index()
    {
        // $search = request()->query('search');

        // if ($search){
        //     $posts = Post::where('title', 'LIKE',"%{$search}%")->latest()->simplePaginate(1);
        // } else {
        //     $posts = Post::latest()->simplePaginate(2);
        // }

        // if ($search = \Request::get('search')) {
        //     $posts = Post::where(function($query) use($search){
        //         $query->where('title', 'LIKE',"%$search%");
        //     })->paginate(2);
        // } else {
        //     $posts = Post::latest()->simplePaginate(2);
        // }

        return view('frontpage')
            ->with('categories', Category::all())
            ->with('tags', Tag::all())
            ->with('posts', Post::searched()->latest()->simplePaginate(2));
    }
}

