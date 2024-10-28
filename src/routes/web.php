<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('landing');
});

Route::middleware('permission:see-panel')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/pull-events', [EventController::class, 'pullEvents'])->name('pull-events');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

// Rutas de la aplicación

Route::get('/contador', function () {
    return view('contador', ['número' => 5]);
})->name('contador');

Route::get('/contador/{número}/inc', function ($número) {
    $número = min($número + 1, 10); // No permite exceder de 10
    return view('contador', ['número' => $número]);
})->name('contador.inc');

Route::get('/contador/{número}/dec', function ($número) {
    $número = max($número - 1, 0); // No permite bajar de 0
    return view('contador', ['número' => $número]);
})->name('contador.dec');

Route::get('/contador/{número}/reinicio', function ($número) {
    return view('contador', ['número' => 0]);
})->name('contador.reinicio');

Route::get('/contador/{número}/duplicar', function ($número) {
    $número = min($número * 2, 10);
    return view('contador', ['número' => $número]);
})->name('contador.duplicar');

use Illuminate\Http\Request;
Route::get('/contador/establecer', function (Request $request) {
    $número = $request->query('número', 0); // Obtén 'número' desde la cadena de consulta, con un valor predeterminado de 0
    $número = min(max($número, 0), 10); // Limitar entre 0 y 10
    return view('contador', ['número' => $número]);
})->name('contador.establecer');
