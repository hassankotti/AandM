<?php

use App\Model\Cart;
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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cart', 'CartController@index')->name('cart');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::post('/cart-add', 'CartController@add')->name('cart.add');
Route::delete('/cart-dalete', 'CartController@destroy')->name('cart.destroy');

Route::get('/cart/checkout', 'CartController@checkout')->name('checkout');
Route::get('/profile', 'UserController@profile')->name('profile');
Route::post('/orders', 'OrderController@store')->name('orders.placed');

Route::middleware(['auth' => 'check_admin'])->prefix('admin')->group(function () {
    Route::get('/',  'DashboardController@index')->name('dashboard');
    Route::resource('/category', 'CategoryController')->name('index', 'category');
    Route::resource('/product', 'ProductController')->name('index', 'product');
    Route::resource('/orders', 'OrderController')->except(['store'])->name('index', 'order');
    Route::resource('/users', 'UserController')->name('index', 'users');
});