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

//transaction
Route::resource('transaction', 'TransactionController');

// Admin 
Route::get('/admin/menus', 'MenuController@index');
Route::get('/admin' , 'AdminController@index')->name('admin.home');

//forms
Route::resource('admin/form', 'FormController');
Route::get('admin/forms', 'FormController@getForms')->name('get.forms');

//Transaction Forms
Route::resource('transaction/form', 'Transaction\FormController', ['as' => 'transaction']);
Route::get('transaction/form/check/{transactionID}', 'Transaction\FormController@check')->name('transaction.form.select');
Route::get('transactionForms', 'Transaction\FormController@getTransactionForms')->name('transaction.forms');

//User Groups
Route::resource('admin/teammate', 'TeammateController');

//Transactio form filed controller
Route::post('transactionFormfieldscreate', 'TransactionFormFieldController@create')->name('transactionformfieldscreate');
Route::post('transactionFormfieldstore', 'TransactionFormFieldController@store')->name('transactionFormFieldstore');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/transaction/dashboard/{id}', 'Transaction\DashboardController@show')->name('transaction.dashboard');

Route::resource('field', 'FieldController');
Route::get('fieldList', 'FieldController@getFields')->name('fieldList');

// checklist
Route::resource('transaction/checklistItems', 'Transaction\ChecklistItemsController');

// contacts
Route::resource('transaction/contact', 'Transaction\ContactController');
Route::get('transaction/contact/{transactionID}/make', 'Transaction\ContactController@make')->name('transaction.contact.make');

Route::get('hello', 'Transaction\ContactController@getCurrentContacts');