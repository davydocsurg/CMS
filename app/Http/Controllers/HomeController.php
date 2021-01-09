<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Profile;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard')
            ->with('user', Auth::user())
            ->with('profile', Profile::all())
            ->with('posts_count', Post::all()->count())
            ->with('trashedposts_count', Post::onlyTrashed()->get()->count())
            ->with('categories_count', Category::all()->count())
            ->with('tags_count', Tag::all()->count())
            ->with('writers_count', User::all()->count());
    }
}
