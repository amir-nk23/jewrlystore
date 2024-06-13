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


use Illuminate\Support\Facades\Route;

Route::webSuperGroup('admin',function (){

    Route::get('/product',[\Modules\Product\Http\Controllers\Admin\ProductController::class,'index'])->name('product.index');
    Route::get('/product/create',[\Modules\Product\Http\Controllers\Admin\ProductController::class,'create'])->name('product.create');
    Route::post('/product',[\Modules\Product\Http\Controllers\Admin\ProductController::class,'store'])->name('product.store');
},[]);
