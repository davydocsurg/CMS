<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog\PostsController;

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

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('blog/post/{post}', [PostsController::class, 'show'])->name('blog.show');
Route::get('blog/categories/{category}', [PostsController::class, 'category'])->name('blog.category');
Route::get('blog/tags/{tag}', [PostsController::class, 'tag'])->name('blog.tag');

Auth::routes();

Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('users', 'UsersController@index')->name('users.index');
    Route::get('users/profile', 'UsersController@editUser')->name('users.edit_profile');
    Route::put('users/profile', 'UsersController@updateUser')->name('users.update_profile');
    Route::post('users/{user}/make_admin', 'UsersController@makeAdmin')->name('users.make_admin');
    Route::post('users/{user}/remove_admin', 'UsersController@removeAdmin')->name('users.remove_admin');
    //
    // Route::get('user', 'UsersController@create')->name('user.createNew');
    // Route::post('user', 'UsersController@store')->name('user.storeNew');
    // Route::get('user/{user}/editNew', 'UsersController@edit')->name('user.editNew');
    // Route::post('user/{user}', 'UsersController@update')->name('user.update');

    Route::resource('/user', 'Admin\AdminController');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/tags', 'TagsController');
    Route::resource('/post', 'PostController');
    Route::get('/trashed', 'PostController@trashed')->name('trashed_posts.index');
    Route::put('/restore-post/{post}', 'PostController@restore')->name('restore-posts');
});

Route::get('/notfound', function () {
    return view('pages.error');
    // return redirect()->back();
})->name('notfound');

