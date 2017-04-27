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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

// dashboard routes
Route::get('/dashboard', 'TransactionController@index');


// start transaction routes
Route::get('/start', 'TransactionController@create');

// Admin 
Route::get('/admin/menus', 'MenuController@index');

//forms
Route::get('/admin/forms', 'FormController@index');
Route::get('/admin/form' , 'FormController@create');
Route::post('/admin/form', 'FormController@store');
Route::get('/admin/form/{id}', 'FormController@show');
Route::put('/admin/form', 'FormController@edit');