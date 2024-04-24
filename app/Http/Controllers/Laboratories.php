<?php

namespace App\Http\Controllers;

use App\Models\laboratorie;
use Illuminate\Http\Request;

class Laboratories extends Controller
{
    protected function create(Request $request)
    {
        $request->validate([
            'Laboratory_name' => 'required|string|unique:laboratories',
            'Laboratory_address' => 'required|string'
        ]);
        $lab = laboratorie::create($request->all());
        if ($lab) {
            return response()->json(['message' => 'lab added successfully'], 201);
        } else {
            return response()->json(['error' => 'Error in addition'], 500);
        }
    }
}
