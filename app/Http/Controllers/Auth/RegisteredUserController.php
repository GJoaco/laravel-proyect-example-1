<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisteredUserController extends Controller
{
    public function Store(Request $request)
    {
        $request->validate(
            [
                'name'      => ['required', 'string', 'max:255'],
                'email'     => ['required', 'string', 'max:255', 'email', 'unique:users'],
                'password'  => ['required', 'confirmed', Rules\Password::defaults()],
            ]
        );

        $user = User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]
        );
        
        //Auth::login($user);

        return to_route('login')->with('status', 'User registered!');  
    }
}
