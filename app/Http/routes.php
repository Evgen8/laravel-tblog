<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Support\Facades\Auth;

Route::group(['middleware' => ['web']], function () {

    // View post
    Route::get('post/create', ['as' => 'post.create', 'uses' => 'PostController@create']); // test
    Route::get('post/{slug}', 'PostController@show');
    Route::post('post/comment', 'CommentController@store');

    // Authentication & Registration
    Route::get('/home', 'HomeController@index');
    Route::post('/login', 'Auth\AuthController@loginAjax');
    Route::get('/logout', function () {
        Auth::logout();
        return back();
    });
    /*Route::auth();*/

    // Search
    Route::post('/search', 'MainPageController@search');

    // Home
    Route::get('/', 'MainPageController@index');
    Route::get('/{slug}/{id}', 'MainPageController@sortPost');
});
