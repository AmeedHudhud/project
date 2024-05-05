<?php

namespace App\Http\Controllers;

use App\Models\ContractingOfficeSupervisingSpecialization;
use Illuminate\Http\Request;

class ContractingOfficeSupervisingSpecializationController extends Controller
{
    protected function create(Request $request ){
        $request->validate([
            'project_number' => 'required|string|exists:projects,project_number',
            'specialization_name' => 'required|string|exists:specialties,specialization_name',
            'office_classification' => 'required|integer|exists:supervising_contracting_offices,office_classification',
        ]);
        $specia = ContractingOfficeSupervisingSpecialization::create($request->all());

        if($specia){
            return response()->json(['message'=>"The record was added successfully"],201);
        }else{
            return response()->json(['message'=>"Fail in addition"],500);
        }
    }
}

