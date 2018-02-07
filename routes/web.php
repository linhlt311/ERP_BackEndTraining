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

//Route::get('/', 'UserController@show')->name('show-employee');
//Route::get('/create', 'UserController@create')->name('create-employee');
//Route::put('/add', 'UserController@add')->name('add-employee');

Route::resource('user','ManageUserController');

Route::get('/', function() {
    return view('admin.users.test');
});