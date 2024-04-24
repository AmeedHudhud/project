<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Users extends Controller
{
    protected function createUser(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'gender' => 'required|in:male,female',
            'governorate' => 'required|string',
            'mobile_number' => 'required|string',
            'date_of_birth' => 'required|date',
        ]);
        $user = User::create($validatedData);
        if ($user) {
            return response()->json(['message' => 'user created'], 201);
        } else {
            return response()->json(['message' => 'error'], 500);
        }
    }
    protected function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return response()->json(['user' => $user], 200);
        } else {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

    }
    public function update(Request $request, $email)
    {
        $user = User::where('email', $email)->first();

        if ($user) {
            $request->validate([
                'name' => 'sometimes|required|string',
                'email' => 'sometimes|required|email|unique:users',
                'password' => 'sometimes|required|string|min:8',
                'gender' => 'sometimes|required|in:male,female',
                'governorate' => 'sometimes|required|string',
                'mobile_number' => 'sometimes|required|string',
                'date_of_birth' => 'sometimes|required|date',
            ]);
            $user->update($request->all());
            return $user;
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }
    public function delete(Request $request, $email)
    {
        $user = User::where('email', $email)->first();
        // $user = User::where('email', $email)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $user->delete();
        return response()->json(['message' => 'User deleted successfully'], 200);
    }
}
