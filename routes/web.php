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

Route::get('follow/{user}', 'FollowsController@store')->middleware('auth');
Route::get('/p/create','PostsController@create')->middleware('auth');
Route::get('/p/{post}','PostsController@show')->middleware('auth');

Route::get('/', 'PostsController@index')->middleware('auth');
Route::post('/p','PostsController@store')->middleware('auth');

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show')->middleware('auth');

Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit')->middleware('auth');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update')->middleware('auth');
