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
Route::delete('/about/delPicture/{id}', 'AboutController@delPicture')->name('aboutDelPicture');

Route::resource('/about', 'AboutController');

Route::post('/search', 'SearchController@index')->name('search');

Route::resource('/contact', 'ContactController');

Route::resource('/portfol', 'PortfolioController');

Route::get('/services', 'ServicesController@index');

Route::get('/blog/adding', 'BlogController@addingGet');

Route::post('/blog/adding', 'BlogController@addingPost');

Route::get('/blog/edit/{id}', 'BlogController@editGet');

Route::post('/blog/edit/{id}', 'BlogController@editPost');

Route::get('/blog/del/{id}', 'BlogController@del');

Route::get('/blog/more/{id}', 'BlogController@more');

Route::get('/blog/addComment/{id}', 'BlogController@addCommentGet');

Route::post('/blog/addComment/{id}', 'BlogController@addCommentPost');

Route::get('/blog/delComment/{id}', 'BlogController@delComment');

Route::get('/blog/delPicture/{id}', 'BlogController@delPicture');

Route::get('/blog/like/{id}', 'BlogController@like');

Route::get('/blog', 'BlogController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::delete('/delPicture/{id}', 'MainController@delPicture')->name('mainDelPicture');

Route::resource('/', 'MainController', ['parameters' => ['' => 'main']]);
