<?php

namespace App\Http\Controllers;

use App\Models\ContractorPresence;
use Illuminate\Http\Request;

class ContractorPresenceController extends Controller
{
    public function create(Request  $request) {
        $request->validate([
            'presence' => 'required|in:exist,not exist',
            'notes' => 'string',
            'the_sheet' => 'required|in:exist,not exist',
            'engineer_number' => 'required|integer|exists:engineers,engineer_number',
            'project_number' => 'required|string|exists:projects,project_number',
            'visiting_date' => 'required|exists:visits,visiting_date',
        ]);
        // $table->enum('the_sheet', ['exist', 'not exist']);


        $presence = ContractorPresence::create($request->all());
        if ($presence) {
            return response()->json(['message' => ' created successfully'], 201);
        } else {
            return response()->json(['error' => 'Failed in create'], 500);
        }
    }

    public function update(Request $request,  string $project_number, string $engineer_number, string $visiting_date ){
        $contractorpresence = ContractorPresence::where('project_number', $project_number)
    ->where('visiting_date', $visiting_date)
    ->where('engineer_number', $engineer_number)
    ->first();

    if($contractorpresence){
        $request->validate([
            'presence' => 'sometimes|required|in:exist,not exist',
            'notes' => 'sometimes|string',
            'the_sheet' => 'sometimes|required|in:exist,not exist',
            'engineer_number' => 'sometimes|required|integer|exists:engineers,engineer_number',
            'project_number' => 'sometimes|required|string|exists:projects,project_number',
            'visiting_date' => 'sometimes|required|exists:visits,visiting_date',
        ]);
            // return $contractorpresence;
        $contractorpresence->update($request->all());
        return $contractorpresence;
    }else{
        return response()->json(['message' => 'column not found'], 404);
    }
    // return $residentsPresence;
    }
}
