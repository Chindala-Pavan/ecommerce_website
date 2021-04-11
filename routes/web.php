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

Route::get('/home', function () {
    return view('home');
})->name('home');

//Route::get('/create',function() {return view('create');
//});
Route::get('/categorycreate',function() {return view('categorycreate');
});
//Route::get('/details',function() {return view('details');
//});
Route::resource('product','App\Http\Controllers\ProductsController');
//Route::get('/show','App\Http\Controllers\ProductsController@show');
Route::resource('category','App\Http\Controllers\CategoriesController');
Route::get('/create','App\Http\Controllers\CategoriesController@index');
Route::get('/','App\Http\Controllers\ProductsController@index');
Route::get('/mobile','App\Http\Controllers\ProductsController@mobile');
Route::get('/laptop','App\Http\Controllers\ProductsController@laptop');
Route::get('/watch','App\Http\Controllers\ProductsController@watch');
Route::post('add_to_cart',[App\Http\Controllers\ProductsController::class,'addToCart']);
Route::get('cartlist',[App\Http\Controllers\ProductsController::class,'cartList']);
Route::get('removeitem/{id}',[App\Http\Controllers\ProductsController::class,'removeItem']);
Route::get('/cartitem','App\Http\Controllers\CartController@cartItem');

