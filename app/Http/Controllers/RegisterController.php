<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller

   
{
    // Register a new user
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'mobile' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'mobile' => $validated['mobile'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']), // Hash the password
        ]);

        return response()->json(['message' => 'User registered successfully!', 'user' => $user], 201);
    }

    //Show all User
    public function showAllUsers()
{
    // Retrieve all users from the database
    $users = User::all();

    // Return the users data as a JSON response
   return view('users.index', ['users' => $users]);
}

// Login a user
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'message' => 'Login successful',
                'token' => $token,
            ], 200);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    // Logout user
    public function logout(Request $request)
    {
        // Revoke all tokens for the authenticated user
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logged out successfully'], 200);
    }
}
