<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubProductController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\ProPriceController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/showCat',[CategoryController::class,'index'])->name('show.cat');  // show all category
Route::get('/deleteCat/{id}',[CategoryController::class,'destroy'])->name('delete.cat');  // show all category
Route::post('/insertCat',[CategoryController::class,'store'])->name('insert.cat');  // Insert data
Route::get('/createCat',[CategoryController::class,'create'])->name('create.cat');  // create page show
Route::get('/showCat/{id}',[CategoryController::class,'show'])->name('show.cat');  // show ssingle product
Route::post('/updateCat/{id}',[CategoryController::class,'update'])->name('update.cat');  // show ssingle product

//  Routes for Product
Route::get('/showPro',[ProductController::class,'index'])->name('show.pro');  // show all pro
Route::get('/deletePro/{id}',[ProductController::class,'destroy'])->name('delete.pro');  // show all pro
Route::post('/insertPro',[ProductController::class,'store'])->name('insert.pro');  // Insert data
Route::get('/createPro',[ProductController::class,'create'])->name('create.pro');  // create page show
Route::get('/showPro/{id}',[ProductController::class,'show'])->name('show.pro');  // show ssingle pro
Route::post('/updatePro/{id}',[ProductController::class,'update'])->name('update.pro');  // show ssingle pro

//  Routes for SubProduct
Route::get('/showSubPro',[SubProductController::class,'index'])->name('show.subPro');  // show all pro
Route::Delete('/deleteSubPro/{id}',[SubProductController::class,'destroy'])->name('delete.subPro');  // show all pro
Route::post('/insertSubPro',[SubProductController::class,'store'])->name('insert.subPro');  // Insert data
Route::get('/createSubPro',[SubProductController::class,'create'])->name('create.subPro');  // create page show
Route::get('/showSubPro/{id}',[SubProductController::class,'show'])->name('show.subPro');  // show ssingle pro
Route::post('/updateSubPro/{id}',[SubProductController::class,'update'])->name('update.subPro');  // show ssingle pro

//Routes for storage
Route::get('/showStorage',[StorageController::class,'index'])->name('show.storage');  // show all pro
Route::Delete('/deleteStorage/{id}',[StorageController::class,'destroy'])->name('delete.storage');  // show all pro
Route::post('/insertStorage',[StorageController::class,'store'])->name('insert.storage');  // Insert data
Route::get('/createStorage',[StorageController::class,'create'])->name('create.storage');  // create page show
Route::get('/showStorage/{id}',[StorageController::class,'show'])->name('show.storage');  // show ssingle pro
Route::post('/updateStorage/{id}',[StorageController::class,'update'])->name('update.storage');  // show ssingle pro

//Price against Products
Route::post('/insertProPrice',[ProPriceController::class,'store'])->name('insert.proprice');  // Insert data
