<?php

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog\PostsController;
use App\Http\Controllers\SettingsController;
// use Newsletter;

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

Route::post('/subscribe', function(){
    $email = request('email');

    Newsletter::subscribe($email);

    session()->flash('subscribed', 'You successfully subscribed to our Newsletter.');

    return redirect()->back();
});

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('blog/post/{post}', [PostsController::class, 'show'])->name('blog.show');
Route::get('blog/categories/{category}', [PostsController::class, 'category'])->name('blog.category');
Route::get('blog/tags/{tag}', [PostsController::class, 'tag'])->name('blog.tag');

Auth::routes();

Route::middleware(['auth', 'admin'])->group(function(){
    // Route::get('users', 'UsersController@index')->name('users.index');
    // Route::get('users/profile', 'UsersController@editUser')->name('users.edit_profile');
    // Route::put('users/profile', 'UsersController@updateUser')->name('users.update_profile');
    Route::post('users/{user}/make_admin', 'Admin\UserController@makeAdmin')->name('users.make_admin');
    Route::post('users/{user}/remove_admin', 'Admin\UserController@removeAdmin')->name('users.remove_admin');

    Route::resource('/users', 'Admin\UserController');

    Route::get('settings', 'SettingsController@index')->name('settings.index');
    Route::post('settings/update', 'SettingsController@update_set')->name('settings.update_set');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', 'HomeController@index')->name('home');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/tags', 'TagsController');
    Route::resource('/post', 'PostController');
    Route::get('/trashed', 'PostController@trashed')->name('trashed_posts.index');
    Route::put('/restore-post/{post}', 'PostController@restore')->name('restore-posts');
    // profile
    Route::resource('/profile', 'ProfilesController');
    // Route::get('/profile', 'ProfilesController@index')->name('profile.index');
    // Route::post('/profile/update', 'ProfilesController@update')->name('profile.update');
});

Route::get('/notfound', function () {
    return view('pages.error');
    // return redirect()->back();
})->name('notfound');

Route::get('/test', function ()
{
    return User::find(1)->profile;
});