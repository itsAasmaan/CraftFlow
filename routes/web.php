<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Services\Factory\UserFactory;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\Admin\UserController;

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

    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/{project}/clone', [ProjectController::class, 'createFromTemplate'])->name('projects.clone');
    Route::post('/projects/{project}/clone', [ProjectController::class, 'storeFromTemplate'])->name('projects.clone.store');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
});

Route::resource('projects', ProjectController::class);
Route::post('tasks/{task}/update-assignment', [TaskController::class, 'update'])->name('tasks.update.assignment');

Route::post('projects/{project}/tasks', [TaskController::class, 'store'])->name('tasks.store');

require __DIR__.'/auth.php';
