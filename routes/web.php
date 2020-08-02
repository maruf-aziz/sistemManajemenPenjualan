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

Route::group(['middleware' => ['auth', 'checkRole:admin']], function(){
  // route user
  Route::resource('users', 'UsersController');
  // route supplier
  Route::resource('suppliers', 'SuppliersController');

  // route customers
  Route::resource('customers', 'CustomersController');

  // route product
  Route::resource('products', 'ProductsController');

  // route brand
  Route::resource('brands', 'BrandsController');

  // route units
  Route::resource('units', 'UnitsController');

  // route transactions
  Route::resource('transactions', 'TransactionsController');

  // route purchase
  Route::resource('purchases', 'PurchasesController');

  // route retur sales
  Route::resource('retur_penjualan','RetursalesController');
  Route::post('/list_penjualan', 'RetursalesController@getById');
  Route::get('/cek', 'RetursalesController@cek');

  // route retur purchase
  Route::resource('retur_pembelian', 'ReturpurchaseController');
  Route::post('/list_pembelian', 'ReturpurchaseController@getById');
});

Route::group(['middleware' => ['auth', 'checkRole:admin,sales']], function(){
  Route::resource('products', 'ProductsController');
  Route::get('/report_product', 'ReportController@reportProduct');																							// route get page laporan produk
});

Route::group(['middleware' => ['auth', 'checkRole:admin,pimpinan']], function(){
  Route::get('/report_product', 'ReportController@reportProduct');																							// route get page laporan produk
  Route::get('/report_penjualan', 'ReportController@reportPenjualan');																					// route get page laporan penjualan
  Route::get('/report_pembelian', 'ReportController@reportPembelian');																					// route get page laporan pembelian
});

Route::group(['middleware' => ['auth', 'checkRole:admin,sales,pimpinan']], function(){
  Route::get('/', 'HomeController@index');
});








Route::get('/invoice/{id}', 'TransactionsController@generateInvoice')->middleware('auth');;                                       // route get invoice

Route::get('/produk', 'PurchasesController@getProduct')->middleware('auth');                                                   		// route get select option produk
Route::get('/satuan', 'PurchasesController@getSatuan')->middleware('auth');																												// route get select option satuan
Route::get('/merek', 'PurchasesController@getMerek')->middleware('auth');																													// route get select option merek
Route::get('/supplier', 'PurchasesController@getSupplier')->middleware('auth');																										// route get select option supplier

Route::get('/addSatuan', 'PurchasesController@addNewUnit')->middleware('auth');																										// route json add satuan
Route::get('/addMerek', 'PurchasesController@addNewBrand')->middleware('auth');																										// route json add merek
Route::get('/addMerek', 'PurchasesController@addNewBrand')->middleware('auth');																										// route json add merek
Route::get('/addProduk', 'PurchasesController@addNewProduct')->middleware('auth');																								// route json add produk
Route::get('/addCustomer', 'TransactionsController@addNewCustomer')->middleware('auth');																								// route json add customer

// Route::get('/report_product', 'ReportController@reportProduct')->middleware('auth');																							// route get page laporan produk
Route::get('/report_penjualan', 'ReportController@reportPenjualan')->middleware('auth');																					// route get page laporan penjualan
Route::get('/report_pembelian', 'ReportController@reportPembelian')->middleware('auth');																					// route get page laporan pembelian
Route::get('/report_retur_penjualan', 'ReportController@reportReturPenjualan')->middleware('auth');																// route get page laporan pembelian
Route::get('/report_retur_pembelian', 'ReportController@reportReturPembelian')->middleware('auth');																// route get page laporan pembelian

Route::get('/data_report_product', 'ReportController@getProduct')->middleware('auth');																						  // route get data laporan produk
Route::get('/data_report_penjualan', 'ReportController@getTransaction')->middleware('auth');																			  // route get data laporan penjualan
Route::get('/data_report_pembelian', 'ReportController@getPembelian')->middleware('auth');																				  // route get data laporan pembelian
Route::get('/data_report_retur_penjualan', 'ReportController@getReturPenjualan')->middleware('auth');														  	// route get data laporan pembelian
Route::get('/data_report_retur_pembelian', 'ReportController@getReturPembelian')->middleware('auth');															// route get data laporan pembelian


Route::get('/data_report_penjualan_custom/{tangal}/{month}/{tahun}', 'ReportController@searchTransaction')->middleware('auth');		            // route get data custom laporan penjualan
Route::get('/data_report_pembelian_custom/{tangal}/{month}/{tahun}', 'ReportController@searchPembelian')->middleware('auth');		            	// route get data custom laporan pembelian
Route::get('/data_report_retur_penjualan_custom/{tangal}/{month}/{tahun}', 'ReportController@searchReturPenjualan')->middleware('auth');			// route get data custom laporan pembelian
Route::get('/data_report_retur_pembelian_custom/{tangal}/{month}/{tahun}', 'ReportController@searchReturPembelian')->middleware('auth');			// route get data custom laporan pembelian