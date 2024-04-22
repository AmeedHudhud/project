<?php

namespace App\Http\Controllers;

use App\Models\contractor;
use Illuminate\Http\Request;

class Contractors extends Controller
{
    protected function create(Request $request) {
        $request->validate([
            'Contractor_name' => 'required|string',
            'Building_classification' => 'required|string|in:first_class,second_class,third_class,fourth_class,fifty_class,Unclassified',
        ]);
        $contractor = contractor::create($request->all());
        if ($contractor) {
            return response()->json(['message' => 'contractor added successfully'], 201);
        } else {
            return response()->json(['error' => 'Error in addition'], 500);
        }
    }
    protected function index(Request $request){
        $contractor_id = $request->query('id', null);

        $contractor = contractor::where('id', $contractor_id)->first();
        if($contractor){
            return $contractor;
        }else{
            return response()->json(['message' => 'contractor not found'], 404);
        }
    }
    protected function update(Request $request, $id){
        $contractor = contractor::where('id',$id)->first();
        if($contractor){
            $request->validate([
                'Contractor_name' => 'sometimes|required|string',
                'Building_classification' => 'sometimes|required|string|in:first_class,second_class,third_class,fourth_class,fifty_class,Unclassified',
            ]);

            $contractor->update($request->all());
            return $contractor;
        }else{
            return response()->json(['message' => 'contractor not found'], 404);
        }
    }
    protected function delete(Request $request, $id){
        $contractor = contractor::where('id',$id)->first();
        if($contractor){
            $contractor->delete( );
            return response()->json(['message'=>"Deleted Successfully"]);
        }else{
            return response()->json(['message' => 'contractor not found'], 404);
        }
    }

}
