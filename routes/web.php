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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'PagesController@dashboard')->name('home')->middleware('auth');
// Route::get('/user', 'PagesController@user')->name('user')->middleware('auth');


// route user
Route::resource('users', 'UsersController')->middleware('auth');

// route supplier
Route::resource('suppliers', 'SuppliersController')->middleware('auth');

// route customers
Route::resource('customers', 'CustomersController')->middleware('auth');

// route product
Route::resource('products', 'ProductsController')->middleware('auth');

// route brand
Route::resource('brands', 'BrandsController')->middleware('auth');

// route units
Route::resource('units', 'UnitsController')->middleware('auth');

// route transactions
Route::resource('transactions', 'TransactionsController')->middleware('auth');

// route purchase
Route::resource('purchases', 'PurchasesController')->middleware('auth');

// route retur sales
Route::resource('retur_penjualan','RetursalesController')->middleware('auth');
Route::post('/list_penjualan', 'RetursalesController@getById')->middleware('auth');
Route::get('/cek', 'RetursalesController@cek')->middleware('auth');

// route retur purchase
Route::resource('retur_pembelian', 'ReturpurchaseController')->middleware('auth');
Route::post('/list_pembelian', 'ReturpurchaseController@getById')->middleware('auth');

Route::get('/invoice/{id}', 'TransactionsController@generateInvoice')->middleware('auth');;                                       // route get invoice

Route::get('/produk', 'PurchasesController@getProduct')->middleware('auth');                                                   		// route get select option produk
Route::get('/satuan', 'PurchasesController@getSatuan')->middleware('auth');																												// route get select option satuan
Route::get('/merek', 'PurchasesController@getMerek')->middleware('auth');																													// route get select option merek
Route::get('/supplier', 'PurchasesController@getSupplier')->middleware('auth');																										// route get select option supplier

Route::get('/addSatuan', 'PurchasesController@addNewUnit')->middleware('auth');																										// route json add satuan
Route::get('/addMerek', 'PurchasesController@addNewBrand')->middleware('auth');																										// route json add merek
Route::get('/addMerek', 'PurchasesController@addNewBrand')->middleware('auth');																										// route json add merek
Route::get('/addProduk', 'PurchasesController@addNewProduct')->middleware('auth');																								// route json add produk

Route::get('/report_product', 'ReportController@reportProduct')->middleware('auth');																							// route get page laporan produk
Route::get('/report_penjualan', 'ReportController@reportPenjualan')->middleware('auth');																					// route get page laporan penjualan
Route::get('/report_pembelian', 'ReportController@reportPembelian')->middleware('auth');																					// route get page laporan pembelian

Route::get('/data_report_product', 'ReportController@getProduct')->middleware('auth');																						// route get data laporan produk
Route::get('/data_report_penjualan', 'ReportController@getTransaction')->middleware('auth');																			// route get data laporan penjualan
Route::get('/data_report_pembelian', 'ReportController@getPembelian')->middleware('auth');																				// route get data laporan pembelian


Route::get('/data_report_penjualan_custom/{tangal}/{month}/{tahun}', 'ReportController@searchTransaction')->middleware('auth');		// route get data custom laporan penjualan
Route::get('/data_report_pembelian_custom/{tangal}/{month}/{tahun}', 'ReportController@searchPembelian')->middleware('auth');			// route get data custom laporan pembelian