<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeyController;
use App\Http\Controllers\EncryptController;
use App\Http\Controllers\DecryptController;

Route::get('/', [HomeController::class, 'index'])->name('/');

//Route Kunci
Route::get('/keys', [KeyController::class, 'index'])->name('keys');
Route::post('/keys/generate', [KeyController::class, 'generate'])->name('keys.generate');
Route::get('/keys/fetch', [KeyController::class, 'fetch'])->name('keys.fetch');

//Route Enkripsi
Route::get('/encrypt', [EncryptController::class, 'index'])->name('encrypt');
Route::post('/encrypt/store', [EncryptController::class, 'store'])->name('encrypt.store');

//Route Dekripsi
Route::get('/decrypt', [DecryptController::class, 'index'])->name('decrypt');
Route::post('/decrypt/store', [DecryptController::class, 'store'])->name('decrypt.store');