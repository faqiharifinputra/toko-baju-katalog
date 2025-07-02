<?php

// File: routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukWebController;
use App\Http\Controllers\BeliController;
use App\Http\Controllers\CartController;

Route::get('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

Route::get('/beli/{id}', [BeliController::class, 'beli'])->name('produk.beli');




Route::get('/', [ProdukWebController::class, 'index']);
Route::get('/produk/create', [ProdukWebController::class, 'create']);
Route::post('/produk', [ProdukWebController::class, 'store']);
Route::get('/produk/{id}/edit', [ProdukWebController::class, 'edit']);
Route::put('/produk/{id}', [ProdukWebController::class, 'update']);
Route::delete('/produk/{id}', [ProdukWebController::class, 'destroy']);
