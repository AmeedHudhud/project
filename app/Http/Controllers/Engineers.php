<?php

namespace App\Http\Controllers;

use App\Models\engineer;
use Illuminate\Http\Request;

class Engineers extends Controller
{
    protected function index(Request $request){
        $engineer_number = $request->query('engineer_number', null);

        $engineer = engineer::where('engineer_number', $engineer_number)->first();
        if($engineer){
            return $engineer;
        }else{
            return response()->json(['message' => 'Engineer not found'], 404);
        }
    }
    protected function create(Request $request)
    {
        $request->validate([
            'engineer_number' => 'required|integer|unique:engineers,engineer_number',
            'engineer_name' => 'required|string',
            'mobile_number' => 'required|string',
            'specialization_name' => 'required|string|exists:specialties,specialization_name',

        ]);

        $engineer = engineer::create($request->all());
        if ($engineer) {
            return response()->json(['message' => 'Engineer added successfully'], 201);
        } else {
            return response()->json(['error' => 'Error in addition'], 500);
        }
    }

    protected function update(Request $request, $engineer_number){
        $engineer = engineer::where('engineer_number',$engineer_number)->first();
        if($engineer){
            $request->validate([
                'engineer_number' => 'sometimes|required|integer|unique:engineers,engineer_number',
                'engineer_name' => 'sometimes|required|string',
                'mobile_number' => 'sometimes|required|string',
                'specialization_name' => 'sometimes|required|string|exists:specialties,specialization_name',
            ]);
            $engineer->update($request->all());
            return $engineer;
        }else{
            return response()->json(['message' => 'Engineer not found'], 404);
        }
    }
    protected function delete(Request $request, $engineer_number){
        $engineer = engineer::where('engineer_number',$engineer_number)->first();
        if($engineer){
            $engineer->delete( );
            return response()->json(['message'=>"Deleted Successfully"]);
        }else{
            return response()->json(['message' => 'Engineer not found'], 404);
        }
    }

}
