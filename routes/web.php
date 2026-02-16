<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SensorController; 
use App\Http\Controllers\DeviceController;

// --- HALAMAN DASHBOARD & MONITORING ---
Route::get('/', [SensorController::class, 'index'])->name('dashboard');
Route::get('/monitoring', [SensorController::class, 'monitoring']);
Route::get('/monitoring/export', [SensorController::class, 'export'])->name('monitoring.export');
Route::get('/analisis', [SensorController::class, 'analisis']);

// --- HALAMAN KONTROL & PEMBERSIH ---
Route::get('/kontrol', [DeviceController::class, 'index']);
Route::post('/kontrol/toggle/{id}', [DeviceController::class, 'toggle']);
Route::get('/pembersih', [DeviceController::class, 'pembersih']);

// --- SISTEM LOGIN (MANUAL) ---
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/');
    }

    return back()->withErrors(['email' => 'Email atau password salah.']);
});

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');