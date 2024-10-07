<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('frontend.login');
    }

    public function signupPage()
    {
        return view('frontend.signup');
    }

    public function register(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => 'admin',
        ]);

        return redirect()->route('login')->with('success', 'You have signed up successfully. You can log in now.');
    }

    public function login(Request $request) {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'employee') {
                return redirect()->route('employee.dashboard');
            }
        } else {
            return back()->withErrors(['message' => 'Invalid credentials']);
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
