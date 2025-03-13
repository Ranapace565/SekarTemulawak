<?php

use App\Http\Controllers\Api\ArtikelApiController;
use Illuminate\Support\Facades\Route;

Route::prefix('/artikel')->group(function () {
    Route::get('/', [ArtikelApiController::class, 'index']);  // Semua artikel
    Route::get('/{slug}', [ArtikelApiController::class, 'show']); // Artikel berdasarkan slug
    Route::post('/', [ArtikelApiController::class, 'store']); // Tambah artikel
    Route::post('/update/{slug}', [ArtikelApiController::class, 'update']); // Update artikel
    Route::delete('/{slug}', [ArtikelApiController::class, 'destroy']); // Hapus artikel
});
