<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\LoginController;

// ================= HOME =================
Route::get('/', [PortfolioController::class, 'index'])->name('home');

// ================= LOGIN =================
Route::post('/login', [LoginController::class, 'processLogin'])->name('login');

// ================= LOGOUT =================
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ================= PROJECT =================
Route::get('/project', [ProjectController::class, 'index'])->name('project');
Route::post('/project', [ProjectController::class, 'store'])->name('project.store');
Route::get('/project/create', [ProjectController::class, 'create'])->name('project.create');
Route::get('/project/{id}', [ProjectController::class, 'show'])->name('project.show');
Route::get('/project/{id}/edit', [ProjectController::class, 'edit'])->name('project.edit');
Route::put('/project/{id}', [ProjectController::class, 'update'])->name('project.update');
Route::delete('/project/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');

// ================= DASHBOARD ADMIN =================
Route::get('/dashboard', function () {
    if (!session('login')) {
        return redirect('/')->with('error', 'Login dulu!');
    }
    $projects = \App\Models\Project::all();
    return view('admin.dashboard', compact('projects'));
})->name('dashboard');

// ================= UPLOAD FOTO =================
Route::post('/upload-foto', [PortfolioController::class, 'uploadFoto'])
    ->name('upload.foto');