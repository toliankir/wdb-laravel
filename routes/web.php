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

Route::group(['middleware' => ['auth', 'role']], function () {
//    Route::resource('/posts', 'PostsController');
    Route::get('/posts', 'PostsController@index')->name('posts.index');
    Route::post('/posts', 'PostsController@store')->name('posts.store');
    Route::get('/posts/create', 'PostsController@create')->name('posts.create');

    Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
        Route::get('/', 'DashboardController@index')->name('admin.dashboard');
        Route::get('/posts', 'PostsController@index')->name('admin.posts.index');
        Route::get('/posts/{post}/edit', 'PostsController@edit')->name('admin.posts.edit');
        Route::put('/posts/{post}', 'PostsController@update')->name('admin.posts.update');
        Route::delete('/posts/{post}', 'PostsController@destroy')->name('admin.posts.destroy');

        Route::resource('/users', 'UsersController', ['as' => 'admin']);
        Route::resource('/roles', 'RolesController', ['as' => 'admin']);
        Route::resource('/permissions', 'PermissionController', ['as' => 'admin']);
        Route::get('/permissions/up/{id}', 'PermissionController@up')->name('admin.permission.up');
        Route::get('/permissions/down/{id}', 'PermissionController@down')->name('admin.permission.down');
    });

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
