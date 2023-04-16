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

Auth::routes();
use App\Http\Controllers\UsersController;
use App\Http\Controllers\FollowsController;

//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');


//ログイン中のページ
Route::group(['middleware' => ['auth']], function() {//loginしていなければlogin画面に返すようにする

//   //前ページ共通（login.blade）
//     //フォロー・フォロワー数を渡す
    Route::get('/top','FollowsController@showFollows');

  //topページ
    //ページを表示
    Route::get('/top','PostsController@index');
    //投稿
    Route::get('post/create', 'PostsController@create');
    Route::post('post/create', 'PostsController@create');
    //投稿編集
    Route::get('post/update', 'PostsController@update');
    Route::post('post/update', 'PostsController@update');
    //投稿削除
    Route::get('post/{id}/delete', 'PostsController@delete');
    Route::post('post/{id}/delete', 'PostsController@delete');

  //profileページ
    //ページを表示
    Route::get('/profile', 'UsersController@profile');
    Route::post('/profile', 'UsersController@profile');
    //profileを編集
    Route::get('/profileUpdate', 'UsersController@profileUpdate')->name('profileUpdate');
    Route::post('/profileUpdate', 'UsersController@profileUpdate');

  //searchページ
    //検索ページの表示、検索機能
    Route::get('/search', 'UsersController@search')->name('search');
    Route::post('/search', 'UsersController@search');
    //フォローする・やめる機能
    Route::get('users/{user}/follow', 'FollowsController@follow');
    Route::post('users/{user}/follow', 'FollowsController@follow')->name('follow');
    Route::get('users/{user}/unfollow', 'FollowsController@unfollow');
    Route::post('users/{user}/unfollow', 'FollowsController@unfollow')->name('unfollow');

  //follow-Listページ
    Route::get('/follow-list', 'FollowsController@followList');
    Route::get('/follower-list', 'FollowsController@followerList');

    //userPlofileページ
    Route::get('users/{id}/user-profile','UsersController@userProfile');

    Route::get('/logout', 'Auth\LoginController@logout');
});
