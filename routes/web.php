<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

// --- CAMBIO AQUÍ: ---
// En lugar de 'return view("welcome")', hacemos una redirección al login
Route::get('/', function () {
    return redirect()->route('login');
});
// --------------------

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// --- GRUPO DE RUTAS DE ADMINISTRACIÓN ---
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // --- Users (Admin Only) ---
        Route::middleware(['role:Admin'])
            ->group(function () {
                Route::get('users', function () {
                    return view('admin.users.index');
                })->name('users.index');
            });

        // --- Treatments (Users with permission) ---
        Route::middleware(['permission:admin.treatments.index'])
            ->group(function () {
                Route::get('treatments', function() {
                    return view('admin.treatments.index');
                })->name('treatments.index');
            });

        // --- Patients (Dentists and Receptionists) ---
        Route::middleware(['permission:admin.users.index'])
            ->group(function () {
                Route::get('patients', function() {
                    return view('admin.patients.index');
                })->name('patients.index');
            });
    });