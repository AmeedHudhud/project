<?php

namespace App\Http\Controllers;

use App\Models\engineer;
use Illuminate\Http\Request;

class Engineers extends Controller
{
    protected function createEngineer(Request $request)
    {
        $request->validate([
            'engineer_number' => 'required|integer|unique:engineers,engineer_number',
            'engineer_name' => 'required|string',
            'mobile_number' => 'required|string',
            'specialization_name' => 'required|string|exists:specialties,specialization_name',

        ]);

        $project = engineer::create($request->all());
        if ($project) {
            return response()->json(['message' => 'Engineer added successfully'], 201);
        } else {
            return response()->json(['error' => 'Error in addition'], 500);
        }
    }
}
