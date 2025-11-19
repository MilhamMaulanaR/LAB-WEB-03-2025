<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\StockController;

// Route::get('/', function () {
//     return view('products.index');
// });

Route::resource('categories', CategoryController::class);
Route::resource('warehouses', WarehouseController::class);
Route::resource('products', ProductController::class);

Route::get('stock', [StockController::class, 'index'])->name('stock.index');
Route::get('stock/transfer', [StockController::class, 'showTransferForm'])->name('stock.transfer.form');
Route::post('stock/transfer', [StockController::class, 'processTransfer'])->name('stock.transfer.process');