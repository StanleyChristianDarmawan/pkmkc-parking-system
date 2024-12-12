<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function receiveData(Request $request)
    {
        $distance = $request->input('distance');
        
        if ($distance === null) {
            return response()->json([
                'message' => 'Data jarak tidak ditemukan',
            ], 400);
        }

        Log::info("Jarak yang diterima: " . $distance . " cm");

        return response()->json([
            'message' => 'Data berhasil diterima',
            'distance' => $distance
        ], 200);
    }
}

