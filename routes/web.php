<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;

// ================= HOME =================
Route::get('/', [PortfolioController::class, 'index'])->name('home');

// ================= LOGIN (Custom) =================
Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest')->name('auth.login');

Route::post('/login', [LoginController::class, 'processLogin'])->name('login');

// ================= LOGOUT (Custom) =================
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ================= PROJECT (Custom Routes) =================
Route::get('/project', [ProjectController::class, 'index'])->name('project');

// Protected routes (require auth)
Route::middleware(['auth.check'])->group(function () {
    Route::post('/project', [ProjectController::class, 'store'])->name('project.store');
    Route::get('/project/create', [ProjectController::class, 'create'])->name('project.create');
    Route::get('/project/{id}/edit', [ProjectController::class, 'edit'])->name('project.edit');
    Route::put('/project/{id}', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('/project/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');
});

// Public routes
Route::get('/project/{id}', [ProjectController::class, 'show'])->name('project.show');

// ================= DASHBOARD ADMIN (Custom) =================
Route::get('/dashboard', function () {
    // Check custom session login OR Breeze auth
    if (session('login') || auth()->check()) {
        $projects = \App\Models\Project::all();
        return view('admin.dashboard', compact('projects'));
    }
    
    // Redirect ke login jika tidak login
    return redirect('/login')->with('error', 'Anda harus login terlebih dahulu');
})->name('dashboard');

// ================= UPLOAD FOTO (Custom) =================
Route::post('/upload-foto', [PortfolioController::class, 'uploadFoto'])
    ->name('upload.foto');

// ================= BREEZE AUTH ROUTES =================
require __DIR__.'/auth.php';
