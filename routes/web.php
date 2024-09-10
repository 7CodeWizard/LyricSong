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

Route::get('/','HomeController@home');
Route::get('/login',function(){
    return view('auth.login');
});


Route::get('/register',function(){
    return view('auth.register');
});

Route::post('/register','Auth\RegisterController@register');
Route::post('/login','Auth\LoginController@login');
Route::get('/logout','Auth\LoginController@logout')->name('logout');
Route::post('/songs','SongController@store');
Route::get('/songs','SongController@create');

Route::get('/artists','ArtistController@index')->name('artists');
Route::get('/lyrics','SongController@search_songs')->name('lyrics');
Route::get('/search_artists', 'ArtistController@search')->name('search.artists');;

Route::get('/auth/google', 'Auth\GoogleController@redirectToGoogle')->name('auth.google');
Route::get('/auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');