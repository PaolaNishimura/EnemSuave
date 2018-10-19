<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('categories', 'CategoryController')->except(['show']);

    Route::resource('videos', 'VideoController')->except(['show']);
    Route::resource('videos.categories', 'VideoCategoryController')->only(['index', 'store']);
    
    Route::resource('posts', 'PostController')->except(['show']);
    Route::resource('posts.categories', 'PostCategoryController')->only(['index', 'store']);
    Route::resource('posts.archives', 'PostArchiveController')->only(['index', 'store']);
    
    Route::resource('users', 'UserController')->only(['index', 'show']);
    
    Route::resource('archives', 'ArchiveController')->except(['show']);
});