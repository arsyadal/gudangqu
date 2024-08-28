<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\StockReportController;

Route::get('/', function () {
    return view('welcome');
});


// Rute untuk Item (Barang)
Route::resource('items', ItemController::class);
Route::get('/items', [ItemController::class, 'index'])->name('items.index');
Route::get('/items/{id}', [ItemController::class, 'show'])->name('items.show');
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
Route::post('/items', [ItemController::class, 'store'])->name('items.store');
Route::get('/items/{id}/edit', [ItemController::class, 'edit'])->name('items.edit');
Route::put('/items/{id}', [ItemController::class, 'update'])->name('items.update');
Route::delete('/items/{id}', [ItemController::class, 'destroy'])->name('items.destroy');



// Rute untuk Category (Kategori)
Route::resource('categories', CategoryController::class);
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

// Rute untuk Supplier (Pemasok)
Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create');
Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');
Route::get('/suppliers/{id}/edit', [SupplierController::class, 'edit'])->name('suppliers.edit');
Route::put('/suppliers/{id}', [SupplierController::class, 'update'])->name('suppliers.update');
Route::delete('/suppliers/{id}', [SupplierController::class, 'destroy'])->name('suppliers.destroy');

// Rute untuk StockReport (Laporan Stok)
Route::get('/stock-reports', [StockReportController::class, 'index'])->name('stock_reports.index');
Route::get('/stock-reports/create', [StockReportController::class, 'create'])->name('stock_reports.create');
Route::post('/stock-reports', [StockReportController::class, 'store'])->name('stock_reports.store');
Route::get('/stock-reports/{id}', [StockReportController::class, 'show'])->name('stock_reports.show');
Route::get('/stock-reports/{id}/edit', [StockReportController::class, 'edit'])->name('stock_reports.edit');
Route::put('/stock-reports/{id}', [StockReportController::class, 'update'])->name('stock_reports.update');
Route::delete('/stock-reports/{id}', [StockReportController::class, 'destroy'])->name('stock_reports.destroy');

Route::get('/', [ItemController::class, 'home'])->name('home');


