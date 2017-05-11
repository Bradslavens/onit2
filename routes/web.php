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

// Route::get('/home', 'HomeController@index');

//transaction
Route::resource('transaction', 'TransactionController');

// Admin 
Route::get('/admin/menus', 'MenuController@index');
Route::get('/admin' , 'AdminController@index')->name('admin.home');

//forms
Route::resource('admin/form', 'FormController');
Route::get('admin/forms', 'FormController@getForms')->name('get.forms');

//Transaction Forms
Route::resource('transactionForm', 'TransactionFormController');
Route::get('transactionForm/check/{transactionID}', 'TransactionFormController@check')->name('transaction.form.select');
Route::post('transactionForm/fields', 'TransactionFormController@getFields')->name('transaction.form.fields');
Route::get('transactionForms', 'TransactionFormController@getTransactionForms')->name('transaction.forms');

//User Groups
Route::resource('admin/teammate', 'TeammateController');

//Transactio form filed controller
Route::resource('transactionFormField', 'TransactionFormFieldController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
