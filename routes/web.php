<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

Route::get('/', [HomeController::class, 'index'])                                          ->name('home.index');
Route::get('/product/{product:slug}',[ProductController::class,  'show'])                  ->name('product.show');

//admin
Route::get('/admin/product',[AdminController::class, 'index'])                             ->name('admin.product.index');
Route::get('/admin/product/new-product',[AdminController::class, 'viewCreate'])            ->name('admin.product.new');
Route::post('/admin/product/',[AdminController::class, 'store'])                           ->name('admin.product.store');
Route::get('/admin/{product}/update/',[AdminController::class, 'viewupdate'])                   ->name('admin.product.viewupdate');
Route::patch('/admin/{product}/update/',[AdminController::class, 'update'])                     ->name('admin.product.update');
Route::delete('/admin/product/{id}',[AdminController::class, 'delete'])                    ->name('admin.product.delete');


