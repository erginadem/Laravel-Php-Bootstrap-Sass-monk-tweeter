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


Route::middleware('auth')->group(function(){
    Route::resource('/tweets', 'TweetController');
});

Auth::routes();

Route::get('/logout', function(){
    Auth::logout();
    return redirect('/login');
});



Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tweets/{tweet}/like', 'TweetController@like');

Route::resource('/comments', 'CommentController');
Route::post('/comments/{tweet}', 'CommentController@store');
Route::get('/comments/create/{tweet}', 'CommentController@create');

Route::post('/follow/{user}', 'FollowsController@store');
Route::get('/follow/{user}', 'FollowsController@store');

Route::resource('/profiles', 'ProfilesController');
Route::get('/profiles/{user}', 'ProfilesController@index')->name('profile');

Route::get('/user/following', 'FollowsController@following')->name('following');
Route::get('/user/followers', 'FollowsController@followers')->name('followers');
Route::get('/user/tweetlist', 'TweetController@tweetlist')->name('tweetlist');

Route::get('/latest', 'TweetController@list');

Route::get('/marketing', 'TweetController@marketing')->name('marketing');
