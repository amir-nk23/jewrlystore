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
use Modules\Setting\Http\Controllers\Admin\SettingController;

Route::webSuperGroup('admin',function (){


    Route::get('/setting',[SettingController::class,'index'])->name('setting.index');
    Route::get('/setting/edit/{id}',[SettingController::class,'edit'])->name('setting.edit');
    Route::patch('/setting/{id}',[SettingController::class,'update'])->name('setting.update');

},[]);
