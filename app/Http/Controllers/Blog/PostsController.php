<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;

class PostsController extends Controller
{
    public function show(Post $post,Category $category,Tag $tag)
    {

        return view('blog.show')
            ->with('post', $post)
            ->with('category', $category)
            ->with('posts', $category->posts()->latest()->simplePaginate(2))
            ->with('categories', Category::all())
            ->with('tags', Tag::all());
    }

    public function category(Category $category)
    {

        // $categoryPosts = ;
        return view('blog.category')
            ->with('category', $category)
            ->with('posts', $category->posts()->searched()->latest()->simplePaginate(1))
            ->with('categories', Category::all())
            ->with('tags', Tag::all());
    }

    public function tag(Tag $tag)
    {

        return view('blog.tag')
            ->with('tag', $tag)
            ->with('posts', $tag->posts()->searched()->latest()->simplePaginate(1))
            ->with('categories', Category::all())
            ->with('tags', Tag::all());
            // ->with('posts', $tag->posts()->latest()->simplePaginate(2));

    }

}
