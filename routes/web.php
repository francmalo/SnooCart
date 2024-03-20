<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ColorController;

;
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

Route::get('/', function () {
    return view('welcome');
});





Route::get('admin',[AuthController::class,'login_admin']);
Route::post('admin',[AuthController::class,'auth_login_admin']);
Route::get('admin/logout',[AuthController::class,'logout_admin']);

Route::group(['middleware'=>'admin'],function(){
    Route::get('admin/dashboard',[DashboardController::class,'dashboard']);

    Route::get('admin/admin/list',[AdminController::class,'list']);
    Route::get('admin/admin/add',[AdminController::class,'add']);
    Route::post('admin/admin/add',[AdminController::class,'insert']);
    Route::get('admin/admin/edit/{id}',[AdminController::class,'edit']);
    Route::post('admin/admin/edit/{id}',[AdminController::class,'update']);
    Route::get('admin/admin/delete/{id}',[AdminController::class,'delete']);



    Route::get('admin/category/list',[CategoryController::class,'list'])->name('category.list');
    Route::get('admin/category/add',[CategoryController::class,'add']);
    Route::post('admin/category/add',[CategoryController::class,'insert']);
    Route::get('admin/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::put('admin/category/edit{id}',[CategoryController::class,'update'])->name('category.update');
    // Route::put('admin/category/edit/{id}','CategoryController@update');
    // // Route::put('admin/category/edit/{id}', [CategoryController::class, 'update']);
    Route::get('admin/category/delete/{id}',[CategoryController::class,'delete']);


    Route::get('admin/subcategory/list',[SubCategoryController::class,'list'])->name('subcategory.list');
    Route::get('admin/subcategory/add',[SubCategoryController::class,'add'])->name('subcategory.add');
    Route::post('admin/subcategory/add',[SubCategoryController::class,'insert'])->name('subcategory.insert');
    Route::get('admin/subcategory/edit/{id}',[SubCategoryController::class,'edit'])->name('subcategory.edit');
    // Route::put('admin/subcategory/edit{id}',[SubCategoryController::class,'update'])->name('subcategory.update');
    Route::patch('admin/subcategory/edit/{id}', [SubCategoryController::class, 'update'])->name('subcategory.update');
    Route::get('admin/subcategory/delete/{id}',[SubCategoryController::class,'delete'])->name('subcategory.delete');

    Route::get('admin/brand/list',[BrandController::class,'list'])->name('brand.list');
    Route::get('admin/brand/add',[BrandController::class,'add'])->name('brand.add');
    Route::post('admin/brand/add',[BrandController::class,'insert'])->name('brand.add');
    Route::get('admin/brand/edit/{id}',[BrandController::class,'edit'])->name('brand.edit');
    Route::put('admin/brand/edit{id}',[BrandController::class,'update'])->name('brand.update');
    Route::get('admin/brand/delete/{id}',[BrandController::class,'delete'])->name('brand.add');


    Route::get('admin/color/list',[ColorController::class,'list'])->name('color.list');
    Route::get('admin/color/add',[ColorController::class,'add'])->name('color.add');
    Route::post('admin/color/add',[ColorController::class,'insert'])->name('color.add');
    Route::get('admin/color/edit/{id}',[ColorController::class,'edit'])->name('color.edit');
    Route::put('admin/color/edit{id}',[ColorController::class,'update'])->name('color.update');
    Route::get('admin/color/delete/{id}',[ColorController::class,'delete'])->name('color.add');




    Route::get('admin/product/list',[ProductController::class,'list'])->name('product.list');
    Route::get('admin/product/add',[ProductController::class,'add'])->name('product.add');
    Route::post('admin/product/add',[ProductController::class,'insert'])->name('product.add');
    Route::get('admin/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
    Route::put('admin/product/edit{id}',[ProductController::class,'update'])->name('product.update');
    Route::get('admin/product/delete/{id}',[ProductController::class,'delete'])->name('product.add');

});



