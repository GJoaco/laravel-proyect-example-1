<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    public function Store(Request $request)
    {
        $credentials = $request->validate(
            [
                'email'     => ['required', 'string', 'email'],
                'password'  => ['required', 'string'],
            ]
        );

        if(!Auth::attempt($credentials, $request->boolean('remember')))
        {
            throw ValidationException::withMessages([
                'email' => __('auth.failed')
            ]);            
        }

        $request->session()->regenerate();
        
        return redirect()->intended()->with('status', 'You are logged in');
    }

    public function Destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('login')->with('status', 'You are logged out');
    }
}
