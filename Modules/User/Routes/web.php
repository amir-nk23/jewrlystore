<?php


use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\UserController as UserController;

;



Route::webSuperGroup('admin',function(){


    Route::get('/admin', [UserController::class,'index'])->name('user.index');
    Route::get('/create', [UserController::class,'create'])->name('user.create');
    Route::post('/', [UserController::class,'store'])->name('user.store');


},[]);
