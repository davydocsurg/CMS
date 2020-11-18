<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Category::first()->posts());
        return view('category.index')->with('categories', Category::latest()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories'
        ]);

        Category::create([
            'name' => $request->name
        ])->save();

        session()->flash('success', 'Category created successfully.');

        return redirect(route('categories.index'));
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
    public function edit(Category $category)
    {
        return view('category.create')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        // $category->name = $request->name;
        // $category->save();
        $category->update([
            'name' => $request->name
        ]);
        session()->flash('success', 'Category updated successfully.');
        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $trashed = Post::onlyTrashed()->latest()->get();
        if ($category->posts->count() > 0) {
            session()->flash('cat-warning', 'Category can\'t be deleted because it has some posts!');
            return redirect()->back();
            // dd($category->posts);
        }
        elseif ($category->posts($trashed)->count() > 0) {
            session()->flash('cat-warning', 'Category can\'t be deleted because it has some posts!');
            return redirect()->back();
            // dd($category->posts($trashed));

        }

        // if ($category->posts->whereNotNull('deleted_at')->count()>0) {
        //     session()->flash('cat-warning', 'Category can\'t be deleted because it has some posts!');
        //     return redirect()->back();
        // }

        $category->delete();

        session()->flash('success', 'Category deleted successfully.');

        return redirect(route('categories.index'));

        // dd($category->posts->whereNotNull('deleted_at')->get());
    }
}
