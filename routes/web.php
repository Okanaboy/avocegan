<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductBrandController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductSubCategoryController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::prefix('manage')->middleware('isSuperAdmin')->group(function (){
    
    //Product
    Route::get('/product', [ProductController::class, 'index'])->name('manage.product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('manage.product.create');
    Route::post('/product/create', [ProductController::class, 'store'])->name('manage.product.store');
    Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('manage.product.edit');
    Route::put('/product/{product}/edit', [ProductController::class, 'update'])->name('manage.product.update');
        
    //Color
    Route::get('/color', [ColorController::class, 'index'])->name('manage.color.index');
    Route::get('/color/create', [ColorController::class, 'create'])->name('manage.color.create');
    Route::post('/color/create', [ColorController::class, 'store'])->name('manage.color.store');
    Route::get('/color/{color}/edit', [ColorController::class, 'edit'])->name('manage.color.edit');
    Route::put('/color/{color}/edit', [ColorController::class, 'update'])->name('manage.color.update');
    
    //Category
    Route::get('/category', [ProductCategoryController::class, 'index'])->name('manage.category.index');
    Route::get('/category/create', [ProductCategoryController::class, 'create'])->name('manage.category.create');
    Route::post('/category/create', [ProductCategoryController::class, 'store'])->name('manage.category.store');
    Route::get('/category/{category}/edit', [ProductCategoryController::class, 'edit'])->name('manage.category.edit');
    Route::put('/category/{category}/edit', [ProductCategoryController::class, 'update'])->name('manage.category.update');
    
    //SubCategory
    Route::get('/subcategory', [ProductSubCategoryController::class, 'index'])->name('manage.subcategory.index');
    Route::get('/subcategory/create', [ProductSubCategoryController::class, 'create'])->name('manage.subcategory.create');
    Route::post('/subcategory/create', [ProductSubCategoryController::class, 'store'])->name('manage.subcategory.store');
    Route::get('/subcategory/{subcategory}/edit', [ProductSubCategoryController::class, 'edit'])->name('manage.subcategory.edit');
    Route::put('/subcategory/{subcategory}/edit', [ProductSubCategoryController::class, 'update'])->name('manage.subcategory.update');
    
    //Brand
    Route::get('/brand', [ProductBrandController::class, 'index'])->name('manage.brand.index');
    Route::get('/brand/create', [ProductBrandController::class, 'create'])->name('manage.brand.create');
    Route::post('/brand/create', [ProductBrandController::class, 'store'])->name('manage.brand.store');
    Route::get('/brand/{brand}/edit', [ProductBrandController::class, 'edit'])->name('manage.brand.edit');
    Route::put('/brand/{brand}/edit', [ProductBrandController::class, 'update'])->name('manage.brand.update');

    
});
