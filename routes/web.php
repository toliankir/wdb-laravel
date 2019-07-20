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
    Route::get('/posts', 'PostController@index')->name('posts.index');
    Route::post('/posts', 'PostController@store')->name('posts.store');
    Route::get('/posts/create', 'PostController@create')->name('posts.create');

    Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
        Route::get('/', 'DashboardController@index')->name('admin.dashboard');
        Route::get('/posts', 'PostController@index')->name('admin.posts.index');
        Route::get('/posts/{post}/edit', 'PostController@edit')->name('admin.posts.edit');
        Route::put('/posts/{post}', 'PostController@update')->name('admin.posts.update');
        Route::delete('/posts/{post}', 'PostController@destroy')->name('admin.posts.destroy');

        // Route::get('/rules', 'RuleController@index')->name('admin.rules.index');
        Route::get('/rules/{role}', 'RuleController@show')->name('admin.rules.show');
        Route::post('/rules/{role}', 'RuleController@sync')->name('admin.rules.sync');

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

        Route::post('/permissions', 'PermissionController@store')->name('admin.permissions.store');
        Route::get('/permissions/{permission}', 'PermissionController@show')->name('admin.permissions.show');
        Route::get('/permissions/{permission}/edit', 'PermissionController@edit')->name('admin.permissions.edit');
        Route::put('/permissions/{permission}', 'PermissionController@update')->name('admin.permissions.update');
        Route::delete('/permissions/{user}', 'PermissionController@destroy')->name('admin.permissions.destroy');
        Route::get('/permissions/up/{id}', 'PermissionController@up')->name('admin.permission.up');
        Route::get('/permissions/down/{id}', 'PermissionController@down')->name('admin.permission.down');
    });

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
