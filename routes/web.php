<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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



Auth::routes();

Route::get('/', function(){
    redirect()->route('home');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cart', 'CartController@index')->name('cart');

Route::middleware(['auth'=>'check_admin'])->prefix('admin')->group( function () {
    Route::get('/',  'DashboardController@index')->name('dashboard');
    Route::resource('/category', 'CategoryController')->name('index','category');
    Route::resource('/product','ProductController')->name('index','product');
});