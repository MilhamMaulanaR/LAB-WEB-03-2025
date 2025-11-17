<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use App\Models\Category;
use App\Models\Warehouse;
use App\Models\Product;

Route::get('/', function () {
    // Ambil data hitungan
    $totalCategories = Category::count();
    $totalWarehouses = Warehouse::count();
    $totalProducts = Product::count();
    
    // Kirim data ke view
    return view('dashboard', compact(
        'totalCategories', 
        'totalWarehouses', 
        'totalProducts'
    ));
});

Route::resource('categories', CategoryController::class);
Route::resource('warehouses', WarehouseController::class);
Route::resource('products', ProductController::class);
Route::get('/stocks', [StockController::class, 'index'])->name('stocks.index');
Route::post('/stocks/transfer', [StockController::class, 'transfer'])->name('stocks.transfer');