<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class ForgotPasswordController extends Controller
{

    public function forgotPassword()
    {
        return view('frontend.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $user = User::where('email', $request->email)->first();

        $token = app('auth.password.broker')->createToken($user);
        $resetUrl = url('password/reset', $token);

        Mail::send('email.password-reset', [
            'user' => $user,
            'resetUrl' => $resetUrl,
        ], function($message) use ($user) {
            $message->to($user->email);
            $message->subject('Password Reset Request');
        });

        return back()->with('success', 'A password reset link has been sent to your email.');
    }

    public function showResetForm($token)
    {
        return view('frontend.reset-password')->with(['token' => $token]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'token' => 'required',
        ]);

        $response = Password::reset($request->only('email', 'password', 'password_confirmation', 'token'), function ($user, $password) {
            $user->password = bcrypt($password);
            $user->save();
        });

        if ($response == Password::PASSWORD_RESET) {
            return redirect()->route('frontend.login')->with('success', 'Password reset successfully!');
        }

        throw ValidationException::withMessages(['email' => [trans($response)]]);
    }
}
