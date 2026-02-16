<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SensorController;
use App\Models\Reading;
use App\Http\Controllers\DeviceController; // <--- TARUH DI SINI (PALING ATAS)

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// 1. Route untuk ESP32 kirim data sensor (POST)
Route::post('/readings', [SensorController::class, 'store']);

// 2. Route KHUSUS untuk Grafik ambil data terbaru (GET)
Route::get('/readings/latest', function () {
    return Reading::latest()->first();
});

// 3. Route untuk ESP32 baca status alat (GET)
Route::get('/device/{id}/status', [DeviceController::class, 'getStatus']);