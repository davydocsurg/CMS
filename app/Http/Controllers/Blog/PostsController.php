<?php

namespace App\Http\Controllers\Blog;

use App\Tag;
use App\Post;
use App\Setting;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function show(Post $post,Category $category,Tag $tag)
    {
        $next_id = Post::where('id', '>', $post->id)->min('id');

        $prev_id = Post::where('id', '<', $post->id)->max('id');

        return view('blog.show')
            ->with('post', $post)
            ->with('category', $category)
            ->with('posts', $category->posts()->latest()->simplePaginate(4))
            ->with('categories', Category::all())
            ->with('title', Setting::first()->site_name)
            ->with('next', Post::find($next_id))
            ->with('prev', Post::find($prev_id))
            ->with('tags', Tag::all());
    }

    public function category(Category $category, Post $post)
    {

        // $next_id = Post::where('id', '>', $post->id)->min('id');

        // $prev_id = Post::where('id', '<', $post->id)->max('id');

        // $categoryPosts = ;
        return view('blog.category')
            ->with('category', $category)
            ->with('posts', $category->posts()->searched()->latest()->simplePaginate(2))
            ->with('categories', Category::all())
            ->with('title', Setting::first()->site_name)
            // ->with('next', Post::find($next_id))
            // ->with('prev', Post::find($prev_id))
            ->with('tags', Tag::all());
    }

    public function tag(Tag $tag, Post $post, Category $category)
    {
        // $next_id = Post::where('id', '>', $post->id)->min('id');

        // $prev_id = Post::where('id', '<', $post->id)->max('id');


        return view('blog.tag')
            ->with('tag', $tag)
            ->with('posts', $tag->posts()->searched()->latest()->simplePaginate(2))
            ->with('categories', Category::all())
            ->with('title', Setting::first()->site_name)
            // ->with('next', Post::find($next_id))
            // ->with('prev', Post::find($prev_id))
            ->with('tags', Tag::all());
            // ->with('posts', $tag->posts()->latest()->simplePaginate(2));

    }

}
