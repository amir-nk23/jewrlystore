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
use Modules\Installment\Http\Controllers\Admin\InstallmentController;


Route::webSuperGroup('admin',function (){

    Route::get('/installment', [InstallmentController::class ,'index'])->name('installment.index');
    Route::get('/installment/create', [InstallmentController::class ,'create'])->name('installment.create');
    Route::post('/installment/store', [InstallmentController::class ,'store'])->name('installment.store');
    Route::get('/installment/show/{id}', [InstallmentController::class ,'show'])->name('installment.show');
    Route::patch('/installmetn/payment/{id}', [InstallmentController::class ,'payment'])->name('installmetn.payment');


},[]);

