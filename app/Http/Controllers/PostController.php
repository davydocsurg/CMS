<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Posts\CreatePostsRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Post;
use App\Setting;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class PostController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('verifyCategoriesCount')->only(['create', 'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts', Post::latest()->paginate(5))
            ->with('tags', Tag::latest()->get())->with('title', Setting::first()->site_name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category, Tag $tag)
    {
        if ($category->count() == 0 || $tag->count() == 0) {
            \session()->flash('info', 'You can\'t Create A Post Without Tags and Categories');
        }

        return view('posts.create')->with('categories', Category::all())->with('tags', Tag::all())->with('title', Setting::first()->site_name);
    }
    // ->with('post', $post)

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostsRequest $request)
    {
        // dd($request->all());
        // upload the image to storage
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file->move(public_path() . '/posts/', $file->getClientOriginalName());
            $url = URL::to("/") . '/posts/' . $file->
                getClientOriginalName();

            // $image = $request->image->store('posts');
        }
        $image = $url;

        // create the post
        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'published_at' => $request->published_at,
            'image' => $image,
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,
            // 'post-trixFields' => request('post-trixFields'),
        ]);

        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }

        // message flash
        session()->flash('success', 'Post created successfully.');

        // redirect user
        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // dd($post->tags->pluck('id')->toArray());
        return view('posts.create')->with('post', $post)
            ->with('title', Setting::first()->site_name)
            ->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {

        // $data = $request->only(['title', 'description', 'published_at', 'content']);

        // check if there's a new image
        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('uploads/posts', $image_new_name);
            $post->image = 'uploads/posts/' . $image_new_name;
            $post->save();
        }

        $post->title = $request->title;
        $post->description = $request->description;
        $post->content = $request->content;
        // $post->category_id = $request->category_id;
        $post->published_at = $request->published_at;
        // $post->image = $url;

        if ($request->tags) {
            $post->tags()->sync($request->tags);
        }

        if ($request->category_id) {
            $post->category_id = $request->category_id;
            $post->save();
        }

        $post->save();

        // $post->update($data);

        session()->flash('success', 'Post updated successfully.');

        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post = Post::withTrashed()->whereId($id)->firstOrFail();
        $postImage = public_path('posts/') . $post->image;
        // $post->delete();
        if ($post->trashed()) {
            // Storage::delete($post->image);
            // @unlink($postImage);
            $post->forceDelete();
        } else {
            $post->delete();
        }

        session()->flash('success', 'Post deleted successfully.');

        return redirect(route('post.index'));
    }

    /**
     * Display trashed posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $trashed = Post::onlyTrashed()->latest()->paginate(5);

        return view('posts.index')->withPosts($trashed)->with('title', Setting::first()->site_name);
    }

    /**
     * Restore trashed posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $post = Post::withTrashed()->whereId($id)->firstOrFail();

        $post->restore();

        session()->flash('success', 'Post restored successfully.');

        return redirect()->back();
    }
}
