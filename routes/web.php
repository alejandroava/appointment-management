<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;

// Ruta de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Middleware de autenticación
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Redirección dinámica según el rol del usuario
    Route::get('/redirect', function () {
        $user = auth()->user();

        if ($user->hasRole('doctor')) {
            return redirect()->route('admin.panel');
        }

        if ($user->hasRole('paciente')) {
            return redirect()->route('dashboard');
        }

        // Redirección predeterminada si el usuario no tiene rol válido
        return redirect()->route('dashboard');
    })->name('redirect');

    // Panel del paciente
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Panel del doctor
    Route::middleware('role:doctor')->group(function () {
        Route::get('/admin/panel', function () {
            return view('admin.panel'); // Asegúrate de tener esta vista creada
        })->name('admin.panel');
    });
});

// Rutas de citas
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
});
