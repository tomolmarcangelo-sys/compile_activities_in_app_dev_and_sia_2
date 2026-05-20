<?php

use App\Http\Controllers\SorcererController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SorcererController::class, 'index']); // Home/List
Route::get('/sorcerers', [SorcererController::class, 'index'])->name('sorcerers.index');
Route::get('/sorcerers/{id}', [SorcererController::class, 'show'])->name('sorcerers.show');