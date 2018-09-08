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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'MainController@index')->name('home');

//Posts
Route::get('/post/add', 'PostController@create')->name('post.create');
Route::post('/post/add', 'PostController@store')->name('post.save');
Route::post('/post/update', 'PostController@update')->name('post.update');
Route::get('/post/{id}/edit', 'PostController@edit')->name('post.edit');
Route::get('/post/{id}/delete', 'PostController@destroy')->name('post.delete');
Route::get('/post/{post}', 'PostController@show')->name('post.show');

//Category
Route::get('/category', 'CategoryController@index')->name('category.index');
Route::get('/category/add', 'CategoryController@create')->name('category.create');
Route::post('/category/add', 'CategoryController@store')->name('category.save');
Route::post('/category/update', 'CategoryController@update')->name('category.update');
Route::get('/category/{id}', 'CategoryController@show')->name('category.show');
Route::get('/category/{id}/edit', 'CategoryController@edit')->name('category.edit');
Route::get('/category/{id}/delete', 'CategoryController@delete')->name('category.delete');

//Category
Route::post('posts/{post}/comments', 'CommentsController@store')->name('comments.create');




