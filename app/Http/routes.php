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

Route::group(['middleware' => ['web']], function () {

    if (!Request::is('admin')) {
        Route::get('/category/{slug}', 'MainPageController@sortPost');
    }
    // View post
    Route::get('post/create', ['as' => 'post.create', 'uses' => 'PostController@create']); // test
    Route::get('post/{slug}', 'PostController@show');
    Route::post('post/comment', 'CommentController@store');

    // Search
    Route::post('/search', 'MainPageController@search');

    // Admin panel
    Route::group(['prefix' => 'admin', 'namespace'=>'Admin', 'middleware' => ['adminAuth']], function()
    {
        Route::get('/', 'IndexController@index');

        Route::get('/posts', 'PostController@posts');
        Route::get('/posts/{id}', 'PostController@viewPost');
        Route::post('/posts/publish', 'PostController@publish');
        Route::post('/posts/change_category', 'PostController@change_cat');

        Route::get('/users', 'UserController@users');

        Route::get('/administrators', 'AdminController@administrators');
        Route::post('/administrators', 'AdminController@add_admin');
        Route::get('/administrators/{id}', 'AdminController@edit_admin');
        Route::put('/administrators/{id}', 'AdminController@save_admin');
        Route::delete('/administrators/{id}', 'AdminController@delete_admin');
        Route::post('/email', 'AdminController@send_mail');
    });
    //});

    // Home
    Route::get('/', 'MainPageController@index');
    Route::get('/home', 'HomeController@index');

});

// Authentication & Registration
Route::auth();
$this->get('/admin/login', 'Auth\AdminAuthController@showAdminLoginForm');
$this->post('/admin/login', 'Auth\AdminAuthController@login');
$this->post('/login', 'Auth\AuthController@loginAjax');

Route::get('/admin/logout', function () {
    Auth::logout();
    return redirect('/admin');
});
