<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::redirect('/', '/login'); // Opcional: Para que redirija al login al entrar

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// --- NUEVO GRUPO DE RUTAS DE ADMINISTRACIÓN ---
Route::middleware(['auth', 'role:Admin']) // Solo Admins
    ->prefix('admin') // La URL será /admin/users
    ->name('admin.')  // Los nombres serán admin.users.index
    ->group(function () {
        
        // Rutas para Gestión de Usuarios
        Route::resource('users', UserController::class);
        
        // --- NUEVA RUTA: TRATAMIENTOS ---
        Route::resource('treatments', \App\Http\Controllers\Admin\TreatmentController::class);
    });