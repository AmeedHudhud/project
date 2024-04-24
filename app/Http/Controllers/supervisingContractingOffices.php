<?php

namespace App\Http\Controllers;

use App\Models\SupervisingContractingOffice;
use Illuminate\Http\Request;

class supervisingContractingOffices extends Controller
{
    protected function create(Request $request)
    {
        $request->validate([
            'office_name' => 'required|string',
            'office_classification' => 'required|integer|unique:supervising_contracting_offices,office_classification'
        ]);
        $office = SupervisingContractingOffice::create($request->all());
        if ($office) {
            return response()->json(['message' => 'office added successfully'], 201);
        } else {
            return response()->json(['error' => 'Error in addition'], 500);
        }
    }
    protected function index(Request $request)
    {
        $office_classification = $request->query('office_classification', null);

        $office = SupervisingContractingOffice::where('office_classification', $office_classification)->first();
        if ($office) {
            return $office;
        } else {
            return response()->json(['message' => 'office not found'], 404);
        }
    }
    protected function update(Request $request, $office_classification)
    {
        $office = SupervisingContractingOffice::where('office_classification', $office_classification)->first();
        if ($office) {
            $request->validate([
                'office_name' => 'sometimes|required|string',
                'office_classification' => 'sometimes|required|integer|unique:supervising_contracting_offices,office_classification'
            ]);

            $office->update($request->all());
            return $office;
        } else {
            return response()->json(['message' => 'office not found'], 404);
        }

    }
    protected function delete(Request $request, $office_classification)
    {
        $office = SupervisingContractingOffice::where('office_classification', $office_classification)->first();
        if ($office) {
            $office->delete();
            return response()->json(['message' => "Deleted Successfully"]);
        } else {
            return response()->json(['message' => 'office not found'], 404);
        }
    }
}
