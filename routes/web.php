<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});


Route::get('/posts', 'postsController@index')->name('posts.index');
Route::post('/posts', 'postsController@create')->name('post.create');
Route::get('/reads_posts', 'postsController@read')->name('posts.read');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post_update/{id}', 'postsController@update')->name('posts.form.update');
Route::post('/post_update', 'postsController@update_post')->name('posts.update');

Route::get('/post_delete/{id}', 'postsController@delete')->name('posts.delete');