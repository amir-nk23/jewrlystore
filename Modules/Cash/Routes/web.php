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
use Modules\Cash\Http\Controllers\Admin\CashController;

Route::webSuperGroup('admin',function (){

    Route::get('/cash', [CashController::class ,'index'])->name('cash.index');
    Route::get('/cash/create', [CashController::class ,'create'])->name('cash.create');
    Route::post('/store', [CashController::class ,'store'])->name('cash.store');


},[]);
