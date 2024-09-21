<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        $tags = Tag::all()->unique('name');

        return view('auth.register', compact('tags'));
    }

    public function store()
    {

        //validate
        $ValidatedAttributes = request()->validate(
            [
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'email' => 'required|email|unique:users',
                'password' => ['required', Password::default(), 'confirmed'], //password confirmed

            ]
        );

        //create
        $user = User::create(
            $ValidatedAttributes,
        );
        //login
        Auth::login($user);

        //redirect
        return redirect('/jobs');

    }
}
