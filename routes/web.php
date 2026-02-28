<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Inertia\Inertia;

Route::inertia('/', 'welcome', [
    'canRegister' => Features::enabled(Features::registration()),
]);

Route::get('/irish', [StudentController::class, 'index']);

Route::middleware(['auth', 'verified'])->group(function (): void {
    Route::inertia('/dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
