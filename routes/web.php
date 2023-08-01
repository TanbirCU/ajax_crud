<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'index'])->name('master');
Route::get('/create-student',[HomeController::class,'create'])->name('add-student');
Route::post('/student-add',[HomeController::class,'store'])->name('student_add');

//poduct ajax crud

Route::get('/productview',[ProductController::class,'productview']);
// Route::get('/addProduct',[ProductController::class,'addProduct']);
// Route::get('/editProduct/{id}',[ProductController::class,'edit'])->name('editProduct');
// Route::resource('product', ProductController::class);
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');

Route::get('/create-product',[ProductController::class,'create'])->name('add-product');
Route::post('/product-create',[ProductController::class,'store'])->name('create_product');
Route::post('/update-product', [ProductController::class, 'update'])->name('product.update');
Route::post('/delete-product',[ProductController::class,'destroy'])->name('delete_product');


// pagination
Route::get('/pagination/paginate-data',[ProductController::class,'pagination']);

//search
Route::get('/search/product',[ProductController::class,'productSearch'])->name('product_search');


