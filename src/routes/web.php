<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ContadorController;


Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::middleware('permission:see-panel')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/pull-events', [EventController::class, 'pullEvents'])->name('pull-events');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

// Rutas de la aplicación

Route::get('/contador',[ ContadorController::class, 'index'])->name('contador')->middleware('auth');
Route::get('/contador/inc/{número}',[ ContadorController::class, 'incrementar'])->name('contador.inc');
Route::get('/contador/dec/{número}', [ContadorController::class, 'decrementar'])->name('contador.dec');
Route::get('/contador/reinicio', [ContadorController::class, 'reiniciar'])->name('contador.reinicio');
Route::get('/contador/duplicar/{número}', [ContadorController::class, 'duplicar'])->name('contador.duplicar');
Route::get('/contador/establecer', [ContadorController::class, 'establecer'])->name('contador.establecer');
Route::get('/contador/alerta/{número}', [ContadorController::class, 'mostrarAlerta'])->name('contador.alerta');
Route::resource('patients', PatientController::class)->middleware('auth');
