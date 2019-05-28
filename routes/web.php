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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'DashboardController@index');

    Route::group(['middleware' => 'role'], function () {
        Route::resource('/users', 'UsersController', ['as' => 'admin']);
        Route::resource('/roles', 'RolesController', ['as' => 'admin']);
        Route::resource('/permissions', 'PermissionController', ['as' => 'admin']);

        Route::get('/permissions/up/{id}', 'PermissionController@up')->name('admin.permission.up');
        Route::get('/permissions/down/{id}', 'PermissionController@down')->name('admin.permission.down');
    });
});
Route::group(['middleware' => 'role'], function () {
    Route::resource('/posts', 'PostsController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
