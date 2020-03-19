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
// Route for Google Auth
Route::get('auth/social', 'Auth\GoogleController@show')->name('social.login');
Route::get('oauth/{driver}', 'Auth\GoogleController@redirectToProvider')->name('social.oauth');
Route::get('{driver}/callback', 'Auth\GoogleController@handleProviderCallback')->name('social.callback');

// Route for Github Auth
Route::get('auth/social', 'Auth\GithubController@show')->name('social.login');
Route::get('oauth/{driver}', 'Auth\GithubController@redirectToProvider')->name('social.oauth');
Route::get('{driver}/callback', 'Auth\GithubController@handleProviderCallback')->name('social.callback');