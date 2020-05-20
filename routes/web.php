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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', ['uses'=>'PostController@index', 'as' => 'contact.index']);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/posts', 'admin\PostsAdmController');
//Route::post('/posts', 'admin\PostsAdmController@store')->name('posts.create');
//Route::post('/posts/show', 'admin\PostsAdmController@show')->name('posts.show');
//Route::put('/posts/update', 'admin\PostsAdmController@update')->name('posts.update');