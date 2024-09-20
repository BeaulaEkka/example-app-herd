<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class RegisteredUserController extends Controller
{
    public function create()
    {
        $tags = Tag::all()->unique('name');

        return view('auth.register', compact('tags'));
    }

    public function store()
    {
        // TODO: implement registration logic
    }
}