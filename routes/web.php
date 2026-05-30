<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employeeController;

// HOME
Route::get('/', function () {
    return view('home');
});

// ✅ STORE — bilkul upar public mein
Route::post('/employee', [employeeController::class, 'store'])
    ->name('employee.store');

// LOGOUT
Route::get('/logout-now', function() {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
});

// BREEZE AUTH
require __DIR__.'/auth.php';

// PROTECTED
Route::middleware('auth')->group(function() {

    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', function() {
        return view('dashboard');
    })->name('profile.edit');

    Route::get('/admin', [employeeController::class, 'index'])
        ->name('employee.index');

    Route::get('/employee/{id}/edit', [employeeController::class, 'edit'])
        ->name('employee.edit');

    Route::put('/employee/{id}', [employeeController::class, 'update'])
        ->name('employee.update');

    Route::delete('/employee/{id}', [employeeController::class, 'destroy'])
        ->name('employee.destroy');

});