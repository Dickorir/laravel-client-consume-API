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
Route::get('/','Auth\AuthController@index')->name('auth.login');
Route::post('/login','Auth\AuthController@processLogin')->name('auth.processLogin');

Route::middleware('json.auth')->group(function() {
    Route::get('/dashboard', 'Auth\DashboardController@index')->name('dashboard');
    Route::resource('/products', 'ProductController');
});

//Route::get('products','ProductController@index')->name('product.index');

