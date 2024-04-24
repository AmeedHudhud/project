<?php

namespace App\Http\Controllers;

use App\Models\correspondence;
use Illuminate\Http\Request;

class Correspondences extends Controller
{
    protected function index($id)
    {
        $correspondence = Correspondence::findOrFail($id);
        if ($correspondence) {
            return response()->json($correspondence, 200);
        } else {
            return response()->json(['message' => 'Correspondence not found'], 404);
        }
    }

    protected function create(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);
        $correspondence = correspondence::create($request->all());

        if ($correspondence) {
            return response()->json(['message' => 'correspondence added successfully'], 201);
        } else {
            return response()->json((['message' => 'fail in addition']));
        }
    }

    protected function delete($id)
    {
        $correspondence = Correspondence::find($id);

        if ($correspondence) {
            $correspondence->delete();
            return response()->json(['message' => 'Correspondence deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Correspondence not found'], 404);
        }
    }


    protected function update(Request $request, $id)
    {
        $correspondence = Correspondence::find($id);

        if ($correspondence) {
            $correspondence->update($request->all());
            return response()->json($correspondence, 200);
        } else {
            return response()->json(['message' => 'Correspondence not found'], 404);
        }
    }
}
