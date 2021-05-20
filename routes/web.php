<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return view('welcome');
});

//Route Against category
Route::get('/showCat',[CategoryController::class,'index'])->name('show.cat');  // show all category
Route::get('/deleteCat/{id}',[CategoryController::class,'destroy'])->name('delete.cat');  // show all category
Route::post('/insertCat',[CategoryController::class,'create'])->name('insert.cat');  // show all category

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
