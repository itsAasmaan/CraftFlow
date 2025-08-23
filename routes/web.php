<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Services\Factory\UserFactory;
use App\Http\Controllers\ThemeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = auth()->user();
    $roleObject = UserFactory::create($user);
    return view($roleObject->dashboardView());
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/settings/theme', [ThemeController::class, 'index'])->name('theme.index');
    Route::post('/settings/theme', [ThemeController::class, 'update'])->name('theme.update');
});

require __DIR__.'/auth.php';
