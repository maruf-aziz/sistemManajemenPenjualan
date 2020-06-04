<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'PagesController@dashboard')->name('home')->middleware('auth');
// Route::get('/user', 'PagesController@user')->name('user')->middleware('auth');

Route::resource('users', 'UsersController')->middleware('auth');
Route::resource('suppliers', 'SuppliersController')->middleware('auth');
Route::resource('customers', 'CustomersController')->middleware('auth');