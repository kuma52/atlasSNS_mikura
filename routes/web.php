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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();
//use App\Http\Controllers\UsersController;いったんコメントアウト
//use App\Http\Controllers\FollowsController;いったんコメントアウト

//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::group(['middleware' => ['auth']], function() {//loginしていなければlogin画面に返すようにする
    Route::get('/top','PostsController@index');

    Route::get('post/create', 'PostsController@create');
    Route::post('post/create', 'PostsController@create');

    Route::get('post/update', 'PostsController@update');
    Route::post('post/update', 'PostsController@update');

    Route::get('post/{id}/delete', 'PostsController@delete');
    Route::post('post/{id}/delete', 'PostsController@delete');

    Route::get('/profile', 'UsersController@profile');
    Route::post('/profile', 'UsersController@profile');
    Route::get('/profileUpdate', 'UsersController@profileUpdate')->name('profileUpdate');
    Route::post('/profileUpdate', 'UsersController@profileUpdate');

    Route::get('/search', 'UsersController@search')->name('search');
    //Route::post('/search', 'UsersController@search');

    Route::get('/follow-list', 'PostsController@followList');
    Route::get('/follower-list', 'PostsController@followerList');

    Route::get('/logout', 'Auth\LoginController@logout');
});
