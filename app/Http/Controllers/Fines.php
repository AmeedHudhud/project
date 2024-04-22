<?php

namespace App\Http\Controllers;

use App\Models\fine;
use Illuminate\Http\Request;

class Fines extends Controller
{
    protected function create(Request  $request) {
        $request->validate([
            'project_number' => 'required|string|exists:projects,project_number',
            'office_classification' => 'required|integer|exists:supervising_contracting_offices,office_classification',
            'number_of_fines' => 'required|integer|min:0',
        ]);
        $fine = fine::create($request->all());
        if ($fine) {
            return response()->json(['message' => 'fine created'], 201);
        } else {
            return response()->json(['message' => 'error in creation'], 500);
        }
    }

    protected function index($officeClassification)
{
    $fine = Fine::where('office_classification', $officeClassification)->first();

    if (!$fine) {
        return response()->json(['message' => 'No fines found for the specified office classification.'], 404);
    }

    return response()->json($fine, 200);
}


protected function update(Request $request, $officeClassification)
{
    $fine = Fine::where('office_classification', $officeClassification)->first();

    if ($fine) {
        $request->validate([
            'project_number' => 'sometimes|required|string|exists:projects,project_number',
            'office_classification' => 'sometimes|required|integer|exists:supervising_contracting_offices,office_classification',
            'number_of_fines' => 'sometimes|required|integer|min:0',
        ]);

        $fine->update($request->all());

        return response()->json(['message' => 'Fine updated successfully','fine' => $fine], 200);
    } else {
        return response()->json(['message' => 'No fines found for the specified office classification'], 404);
    }
}

protected function delete(Request  $request,$officeClassification){
    $fine = Fine::where('office_classification', $officeClassification)->first();
        // $user = User::where('email', $email)->first();

        if (!$fine) {
            return response()->json(['message' => 'fine not found'], 404);
        }
        $fine->delete();
        return response()->json(['message' => 'fine deleted successfully'],200);
}



}
