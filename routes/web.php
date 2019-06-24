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
})->middleware('homepage');

Route::group(['middleware' => ['auth', 'role']], function () {
    Route::get('/posts', 'PostsController@index')->name('posts.index');
    Route::post('/posts', 'PostsController@store')->name('posts.store');
    Route::get('/posts/create', 'PostsController@create')->name('posts.create');

    Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
        Route::get('/', 'DashboardController@index')->name('admin.dashboard');
        Route::get('/posts', 'PostsController@index')->name('admin.posts.index');
        Route::get('/posts/{post}/edit', 'PostsController@edit')->name('admin.posts.edit');
        Route::put('/posts/{post}', 'PostsController@update')->name('admin.posts.update');
        Route::delete('/posts/{post}', 'PostsController@destroy')->name('admin.posts.destroy');

        Route::get('/users', 'UsersController@index')->name('admin.users.index');
        Route::get('/users/create', 'UsersController@create')->name('admin.users.create');
        Route::post('/users', 'UsersController@store')->name('admin.users.store');
        Route::get('/users/{user}/edit', 'UsersController@edit')->name('admin.users.edit');
        Route::put('/users/{user}', 'UsersController@update')->name('admin.users.update');
        Route::delete('/users/{user}', 'UsersController@destroy')->name('admin.users.destroy');

        Route::get('/roles', 'RolesController@index')->name('admin.roles.index');
        Route::get('/roles/create', 'RolesController@create')->name('admin.roles.create');
        Route::post('/roles', 'RolesController@store')->name('admin.roles.store');
        Route::get('/roles/{user}/edit', 'RolesController@edit')->name('admin.roles.edit');
        Route::delete('/roles/{user}', 'RolesController@destroy')->name('admin.roles.destroy');

        Route::post('/permissions', 'PermissionController@store')->name('admin.permissions.store');
        Route::post('/permissions/{permission}', 'PermissionController@show')->name('admin.permissions.show');
        Route::get('/permissions/{permission}/edit', 'PermissionController@edit')->name('admin.permissions.edit');
        Route::put('/permissions/{permission}', 'PermissionController@update')->name('admin.permissions.update');
        Route::delete('/permissions/{user}', 'PermissionController@destroy')->name('admin.permissions.destroy');
        Route::get('/permissions/up/{id}', 'PermissionController@up')->name('admin.permission.up');
        Route::get('/permissions/down/{id}', 'PermissionController@down')->name('admin.permission.down');
    });

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
