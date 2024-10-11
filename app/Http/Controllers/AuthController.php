<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Notifications\EmailVerification;

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

        $user->generateVerificationCode();
        $user->notify(new EmailVerification($user->verification_code));

        return redirect()->route('login')->with('success', 'You have signed up successfully. Please check your email to verify your account.');
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    
            if ($user->role === 'admin' && !$user->email_verified_at) {
                Auth::logout();
                return back()->withErrors(['message' => 'Please verify your email before logging in.']);
            }
    
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'employee') {
                return redirect()->route('employee.dashboard');
            }
        } else {
            return back()->withErrors(['message' => 'Invalid credentials']);
        }
    }

    public function verifyEmail($code)
    {
        $user = User::where('verification_code', $code)->first();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Invalid verification code.');
        }

        $user->email_verified_at = now();
        $user->verification_code = null;
        $user->save();

        return redirect()->route('login')->with('success', 'Your email has been verified. You can log in now.');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
