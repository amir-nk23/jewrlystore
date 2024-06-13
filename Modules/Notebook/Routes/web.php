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
use Modules\Notebook\Http\Controllers\NotebookController;


Route::webSuperGroup('admin',function (){

    Route::patch('/paid/{id}/',[NotebookController::class,'update'])->name('notebook.update');



},[]);
