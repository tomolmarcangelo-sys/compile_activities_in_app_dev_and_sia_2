<?php

use App\Http\Controllers\VibeFeedbackController;
use Illuminate\Support\Facades\Route;

// Redirect home to the form
Route::get('/', function () {
    return redirect()->route('vibe.create');
});

// Requirement 2: Define GET and POST routes
Route::get('/vibe-check', [VibeFeedbackController::class, 'create'])->name('vibe.create');
Route::post('/vibe-check', [VibeFeedbackController::class, 'store'])->name('vibe.store');