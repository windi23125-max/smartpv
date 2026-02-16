<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reading;

class SensorController extends Controller
{
    public function index()
    {
        $latest = Reading::latest()->first();
        $history = Reading::latest()->limit(10)->get();
        if (!$latest) {
            $latest = new Reading(['voltage' => 0, 'current' => 0, 'power' => 0, 'energy' => 0]);
        }
        return view('welcome', compact('latest', 'history'));
    }

    public function store(Request $request)
    {
        $reading = Reading::create($request->all());
        return response()->json(['status' => 'success', 'data' => $reading], 201);
    }

    public function monitoring()
    {
        $readings = Reading::latest()->paginate(20);
        return view('monitoring', compact('readings'));
    }

    
    public function analisis()
{
    $latest = Reading::latest()->first(); // Ambil data yang baru kamu kirim lewat curl
    $maxPower = 500; // Coba set ke 500W agar angka efisiensinya variatif
    $currentPower = $latest ? $latest->power : 0;
    
    $efficiency = ($currentPower / $maxPower) * 100;
    $loss = 100 - $efficiency;

    return view('analisis', compact('efficiency', 'loss', 'currentPower', 'maxPower'));
}
}