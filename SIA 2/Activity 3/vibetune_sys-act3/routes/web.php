<?php

use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VibeFeedbackController;

Route::get('/vibe-check', [VibeFeedbackController::class, 'create'])->name('feedback.create');
Route::post('/vibe-check', [VibeFeedbackController::class, 'store'])->name('feedback.store');

Route::resource('songs', SongController::class);
Route::get('/', [SongController::class, 'index']); // Set playlist as homepage