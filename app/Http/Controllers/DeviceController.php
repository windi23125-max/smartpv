<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;

class DeviceController extends Controller
{
    public function index()
    {
        $devices = Device::all();
        return view('kontrol', compact('devices'));
    }

    public function toggle($id)
    {
        $device = Device::find($id);
        $device->status = !$device->status; 
        $device->save();
        return response()->json(['status' => 'success', 'new_state' => $device->status]);
    }

    public function pembersih()
    {
        $pompa = Device::where('name', 'Pompa Pembersih')->first();
        return view('pembersih', compact('pompa'));
    }

    public function getStatus($id)
    {
        $device = Device::find($id);
        return response()->json(['status' => $device->status]);
    }
}