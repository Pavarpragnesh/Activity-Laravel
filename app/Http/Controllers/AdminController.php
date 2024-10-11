<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
     // Show registration form
    public function showRegisterForm()
    {
        return view('admin.register');
    }

    // Handle admin registration
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:6|confirmed',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000'
        ]);

        // Handle file upload
        $profilePath = null;
        if ($request->hasFile('profile')) {
            $profilePath = $request->file('profile')->store('profiles', 'public');
        }

        // Create admin
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile' => $profilePath
        ]);

        return redirect()->route('admin.login')->with('success', 'Registration successful. Please log in.');
    }

    // Show login form
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Handle admin login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:4',
        ]);

        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            return redirect()->route('admin.home');
        }

        return back()->with('error', 'Invalid credentials');
    }

    // Handle admin logout
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    // Show admin home page
    public function home()
    {
        return view('admin.home');
    }

    // Show all notifications
    public function view()
    {
        $admins = Admin::all();
        return view('admin.view', compact('admins'));
    }
}
