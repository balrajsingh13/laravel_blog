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

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/home', 'HomeController@publishBlog')->name('publish');

Route::get('/blog', 'HomeController@viewBlogs')->name('blogs');

Route::get('/allblog', 'HomeController@viewAllBlogs')->name('allblogs');

Route::get('/editBlog/{blogid}', 'HomeController@bringDataForEdit')->name('bringData');

Route::post('/blog/{id}','HomeController@update')->name('postEdited');

Route::post('/allblog/{id}','HomeController@addComment')->name('addComment');