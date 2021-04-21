<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Rules;
use App\Models\Permissions;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {

    public function register(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
                    'name' => $validatedData['name'],
                    'email' => $validatedData['email'],
                    'password' => Hash::make($validatedData['password']),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
                    'access_token' => $token,
                    'token_type' => 'Bearer',
        ]);
    }

    public function login(Request $request) {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                        'message' => 'Invalid login details'
                            ], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
                    'access_token' => $token,
                    'token_type' => 'Bearer',
        ]);
    }

    public function me(Request $request) {
        return $request->user();
    }

    public function rules() {
        $rules = Rules::join('users', 'users.id', '=', 'rules.added_by')
                ->select('rules.*', 'users.id as uid','users.name as username')
                ->get();
        return $rules;
    }
    
    public function permissions() {
        $permissions = Permissions::join('users', 'users.id', '=', 'permissions.added_by')
                ->select('permissions.*', 'users.id as uid','users.name as username')
                ->get();
        return $permissions;
    }
    
    public function feedback(Request $request) {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                        'message' => 'Invalid login details'
                            ], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        $feedback = Feedback::join('users', 'users.id', '=', 'feedback.logged_by')
                ->select('feedback.*', 'users.id as uid','users.name as username')
                ->get();
        
        return $feedback;
    }

}
