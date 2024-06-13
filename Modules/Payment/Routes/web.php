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
use Modules\Payment\Http\Controllers\Admin\PaymentController as AdminPayment;

Route::webSuperGroup('admin',function (){

Route::post('/payment/{id}',[AdminPayment::class,'pay'])->name('payment.pay');


},[]);
