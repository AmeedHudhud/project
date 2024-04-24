<?php

namespace App\Http\Controllers;

use App\Models\specialtie;
use Illuminate\Http\Request;

class Specialties extends Controller
{
    protected function create(Request $request)
    {
        $request->validate([
            'specialization_name' => 'required|string|unique:specialties'
        ]);
        $spec = specialtie::create($request->all());
        if ($spec) {
            return response()->json(['message' => 'specialtie added successfully'], 201);
        } else {
            return response()->json(['error' => 'Error in addition'], 500);
        }
    }


}
