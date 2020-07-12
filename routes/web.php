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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'PagesController@dashboard')->name('home')->middleware('auth');
// Route::get('/user', 'PagesController@user')->name('user')->middleware('auth');

Route::resource('users', 'UsersController')->middleware('auth');
Route::resource('suppliers', 'SuppliersController')->middleware('auth');
Route::resource('customers', 'CustomersController')->middleware('auth');
Route::resource('products', 'ProductsController')->middleware('auth');
Route::resource('brands', 'BrandsController')->middleware('auth');
Route::resource('units', 'UnitsController')->middleware('auth');
Route::resource('transactions', 'TransactionsController')->middleware('auth');
Route::resource('purchases', 'PurchasesController')->middleware('auth');
Route::resource('retur_penjualan','RetursalesController')->middleware('auth');

Route::get('/invoice/{id}', 'TransactionsController@generateInvoice')->middleware('auth');;

Route::get('/produk', 'PurchasesController@getProduct')->middleware('auth');
Route::get('/satuan', 'PurchasesController@getSatuan')->middleware('auth');
Route::get('/merek', 'PurchasesController@getMerek')->middleware('auth');
Route::get('/supplier', 'PurchasesController@getSupplier')->middleware('auth');

Route::get('/addSatuan', 'PurchasesController@addNewUnit')->middleware('auth');
Route::get('/addMerek', 'PurchasesController@addNewBrand')->middleware('auth');
Route::get('/addMerek', 'PurchasesController@addNewBrand')->middleware('auth');
Route::get('/addProduk', 'PurchasesController@addNewProduct')->middleware('auth');

Route::get('/report_product', 'ReportController@reportProduct')->middleware('auth');
Route::get('/report_penjualan', 'ReportController@reportPenjualan')->middleware('auth');
Route::get('/report_pembelian', 'ReportController@reportPembelian')->middleware('auth');

Route::get('/data_report_product', 'ReportController@getProduct')->middleware('auth');
Route::get('/data_report_penjualan', 'ReportController@getTransaction')->middleware('auth');
Route::get('/data_report_pembelian', 'ReportController@getPembelian')->middleware('auth');


Route::get('/data_report_penjualan_custom/{tangal}/{month}/{tahun}', 'ReportController@searchTransaction')->middleware('auth');
Route::get('/data_report_pembelian_custom/{tangal}/{month}/{tahun}', 'ReportController@searchPembelian')->middleware('auth');