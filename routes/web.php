<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Services\Factory\UserFactory;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ReportController;

Route::get('/', function () {
    return redirect('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        $user = auth()->user();
        $roleObject = UserFactory::create($user);
        return view($roleObject->dashboardView());
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('settings')->group(function () {
        Route::get('/theme', [ThemeController::class, 'index'])->name('theme.index');
        Route::post('/theme', [ThemeController::class, 'update'])->name('theme.update');
    });

    Route::resource('projects', ProjectController::class);

    Route::prefix('projects/{project}')->group(function () {
        Route::get('/clone', [ProjectController::class, 'createFromTemplate'])->name('projects.clone');
        Route::post('/clone', [ProjectController::class, 'storeFromTemplate'])->name('projects.clone.store');
        Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
        Route::get('/edit', [ProjectController::class, 'edit'])->name('projects.edit');
        Route::post('/', [ProjectController::class, 'update'])->name('projects.update');
    });
    
    Route::post('tasks/{task}/update-assignment', [TaskController::class, 'update'])->name('tasks.update.assignment');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('companies', CompanyController::class);
});


Route::middleware(['auth', 'role:admin,manager'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class)->except(['create', 'store', 'show']);
});

Route::middleware(['auth', 'role:admin,manager'])->group(function () {
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::post('/reports/generate', [ReportController::class, 'generate'])->name('reports.generate');

    Route::resource('tasks', TaskController::class)->except(['update']);
    Route::post('/tasks/storeIndividually', [TaskController::class, 'storeIndividually'])->name('tasks.store.individually');
    Route::put('/tasks/{task}/updateIndividually', [TaskController::class, 'updateIndividually'])->name('tasks.update.individually');
});

Route::middleware(['auth', 'role:employee'])->group(function () {
    Route::get('/employee/tasks', [App\Http\Controllers\EmployeeTaskController::class, 'index'])
        ->name('employee.tasks.index');
    Route::get('/employee/tasks/{task}/edit', [App\Http\Controllers\EmployeeTaskController::class, 'edit'])
        ->name('employee.tasks.edit');
    Route::put('/employee/tasks/{task}', [App\Http\Controllers\EmployeeTaskController::class, 'update'])
        ->name('employee.tasks.update');
});
require __DIR__.'/auth.php';