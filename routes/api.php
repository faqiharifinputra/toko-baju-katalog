<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ProdukController;
use App\Http\Controllers\Api\VoucherController;

Route::apiResource('produk', ProdukController::class);
Route::post('/beli', [VoucherController::class, 'beli']);
