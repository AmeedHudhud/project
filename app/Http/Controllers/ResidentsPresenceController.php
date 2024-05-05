<?php

namespace App\Http\Controllers;

use App\Models\ResidentsPresence;
use Illuminate\Http\Request;

class ResidentsPresenceController extends Controller
{
    public function create(Request  $request) {
        $request->validate([
            'presence' => 'required|in:exist,not exist',
            'notes' => 'string',

            'engineer_number' => 'required|integer|exists:engineers,engineer_number',
            'project_number' => 'required|string|exists:projects,project_number',
            'visiting_date' => 'required|exists:visits,visiting_date',
        ]);

        $presence = ResidentsPresence::create($request->all());
        if ($presence) {
            return response()->json(['message' => ' created successfully'], 201);
        } else {
            return response()->json(['error' => 'Failed in create'], 500);
        }
    }

    public function update(Request $request,  string $project_number, string $engineer_number, string $visiting_date ){
        $residentsPresence = ResidentsPresence::where('project_number', $project_number)
    ->where('visiting_date', $visiting_date)
    ->where('engineer_number', $engineer_number)
    ->first();

    if($residentsPresence){
        $request->validate([
            'presence' => 'sometimes|required|in:exist,not exist',
            'notes' => 'sometimes|string',
            'engineer_number' => 'sometimes|required|integer|exists:engineers,engineer_number',
            'project_number' => 'sometimes|required|string|exists:projects,project_number',
            'visiting_date' => 'sometimes|required|exists:visits,visiting_date',
        ]);
        $residentsPresence->update($request->all());
        return $residentsPresence;
    }else{
        return response()->json(['message' => 'column not found'], 404);

    }
    // return $residentsPresence;
    }
}
