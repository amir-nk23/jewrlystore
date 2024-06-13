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
use Modules\Report\Http\Controllers\Admin\ReportController;

Route::webSuperGroup('admin',function (){

    Route::get('/report', [ReportController::class ,'index'])->name('report.index');
    Route::get('/report/show', [ReportController::class ,'show'])->name('report.show');



},[]);
