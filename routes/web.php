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

Route::get('/discuss', function () {
    return view('discuss');
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

// Route for CRUD channels
Route::group(['middleware' => 'auth'], function(){
    Route::get('/channels', 'ChannelsController@index')->name('channels.index');
    Route::get('/channels/create', 'ChannelsController@create');
    Route::post('/channels', 'ChannelsController@store')->name('channels.store');
    Route::get('/{channel}', 'ChannelsController@show');
    Route::get('/edit/{id}', 'ChannelsController@edit')->name('channels.edit');
    Route::put('/editChannel/{id}', 'ChannelsController@editChannel')->name('channels.update');
    Route::get('/delete/{id}', 'ChannelsController@destroy');
});

