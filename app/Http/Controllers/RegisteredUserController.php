<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        $tags = Tag::all()->unique('name');

        return view('auth.register', compact('tags'));
    }

    public function store(Request $request)
    {
        //validate
        $request->validate(
            [
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'email' => 'required|email|unique:users',
                'password' => ['required', Password::default(), 'confirmed'],
                'role' => 'required|string|in:employer,job_seeker',
                // 'company_name' => 'required_if:role,employer|string|max:255', // Only required if role is employer,
                'company_name' => 'nullable|string|max:255',

            ]
        );

        //create
        $user = User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => $request->input('role'),
            'company_name' => $request->input('company_name') ?? null,
        ]);

        // If the user is an employer, create an employer record
        if ($user->role === 'employer') {
            Employer::create([
                'user_id' => $user->id,
                'company_name' => $request->input('company_name'), // Use company_name from request
            ]);

        }

        //login
        Auth::login($user);

        //redirect
        return redirect('/jobs');

    }
}
