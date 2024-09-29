<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use App\Models\Admin;
use App\Models\Employee;

class ForgotPass extends Controller
{

    //send email to reset password
    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $broker = $request->has('user_type') && $request->user_type === 'employee' ? 'employees' : 'admins';
    
        $status = Password::broker($broker)->sendResetLink(
            $request->only('email')
        );
    
        if ($status == Password::RESET_LINK_SENT) {
            return response()->json(['status' => __($status), 'message' => 'success'], 200);
        }
    
        return response()->json(['message' => __($status)], 500);
    }

    //reset and update function
    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $model = $request->user_type === 'employee' ? Employee::class : Admin::class;

        $user = $model::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        $user->password = Hash::make($request->password);
        $user->save();
        
        return response()->json(['message' => 'Password reset successfully.'], 200);
    }
}
