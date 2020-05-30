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
Route::get('/posts', 'admin\PostsAdmController@index')->name('posts');
Route::post('/posts', 'admin\PostsAdmController@salvar')->name('posts.create');
Route::get('/posts/{id}', 'admin\PostsAdmController@delete')->name('posts.delete');
Route::put('/posts/{id}', 'admin\PostsAdmController@atualizar')->name('posts.atualizar');



