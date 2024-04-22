<?php

namespace App\Http\Controllers;

use App\Models\violation;
use Illuminate\Http\Request;

class Violations extends Controller
{
    protected function create(Request $request){
        $request->validate([
            'project_number' => 'required|string|exists:projects,project_number',
            'office_classification' => 'required|integer|exists:supervising_contracting_offices,office_classification',
            'Violation_number'=>'required|integer|min:0',
            'Response'=>'required|in:Answered,Not answered'
        ]);

        $violation = violation::create($request->all());
        if($violation){
            return response()->json(['message' => 'violation created'], 201);
        }else{
            return response()->json(['message' => 'error in creation'], 500);
        }

    }
    protected function index($officeClassification){
    $violations = violation::where('office_classification', $officeClassification)->get();
    if ($violations->isEmpty()) {
        return response()->json(['message' => 'No violations found for the specified office classification.'], 404);
    } else {
        return response()->json(['message' => 'violations', 'violations' => $violations], 200);
    }
    }
    protected function delete($officeClassification, $violationNumber,$project_number){
       // Find the violation by composite primary key
       $violation = Violation::where('office_classification', $officeClassification)
       ->where('Violation_number', $violationNumber)->where('project_number',$project_number)
       ->first();

if ($violation) {
// If violation found, delete it
$violation->delete();
return response()->json(['message' => 'Violation deleted successfully'], 200);
} else {
// If violation not found, return error response
return response()->json(['message' => 'Violation not found'], 404);
}


}
}
