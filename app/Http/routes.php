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

        Route::get('/posts', 'PostController@index');
        Route::get('/posts/{id}', 'PostController@show');
        Route::post('/posts/edit_status', 'PostController@edit_status');
        Route::post('/posts/edit_cat', 'PostController@edit_cat');

        Route::get('/users', 'UserController@users');

        Route::resource('/administrators', 'AdminController');
        Route::post('/email', 'AdminController@send_mail');
    });

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
