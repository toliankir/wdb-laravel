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

Route::group(['middleware' => ['auth', 'role', 'test']], function () {
    Route::post('/posts', 'PostController@store')->name('posts.store');
    Route::get('/posts/create', 'PostController@create')->name('posts.create');
    Route::get('/posts', 'PostController@index')->name('posts.index');
    Route::put('/posts/{post}', 'PostController@update')->name('posts.update');
    Route::get('/posts/{post}/edit', 'PostController@edit')->name('posts.edit');
    Route::delete('/posts/{post}', 'PostController@destroy')->name('admin.posts.destroy');

    Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
        Route::get('/', 'DashboardController@index')->name('admin.dashboard');

        Route::get('/permissions/{role}', 'PermissionController@show')->name('admin.permissions.show');
        Route::post('/permissions/{role}', 'PermissionController@sync')->name('admin.permissions.sync');

        Route::get('/users', 'UserController@index')->name('admin.users.index');
        Route::get('/users/create', 'UserController@create')->name('admin.users.create');
        Route::post('/users', 'UserController@store')->name('admin.users.store');
        Route::get('/users/{user}/edit', 'UserController@edit')->name('admin.users.edit');
        Route::put('/users/{user}', 'UserController@update')->name('admin.users.update');
        Route::delete('/users/{user}', 'UserController@destroy')->name('admin.users.destroy');

        Route::get('/roles', 'RoleController@index')->name('admin.roles.index');
        Route::get('/roles/create', 'RoleController@create')->name('admin.roles.create');
        Route::post('/roles', 'RoleController@store')->name('admin.roles.store');
        Route::get('/roles/{user}/edit', 'RoleController@edit')->name('admin.roles.edit');
        Route::put('/roles/{user}', 'RoleController@update')->name('admin.roles.update');
        Route::delete('/roles/{user}', 'RoleController@destroy')->name('admin.roles.destroy');
    });

});
Auth::routes();
