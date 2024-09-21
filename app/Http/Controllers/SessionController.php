<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        //validate
        $sessionAttributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($sessionAttributes)) {
            throw ValidationException::withMessages([
                'email' => 'The provided credentials are incorrect.',
                
            ]);
        }
        //attempt to log in the user
        Auth::attempt($sessionAttributes);

        //regenerate the token session
        request()->session()->regenerate();
        return redirect('/jobs');

        //redirect
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}