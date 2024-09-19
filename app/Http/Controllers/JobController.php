<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(3);
        return view('jobs.index', [
            'jobs' => $jobs,

        ]);
    }

    public function create()
    {            
        $tags = Tag::all()->unique('name');
        return view('jobs.create', compact('tags'));
        }
    

    public function show()
    {

    }

    public function store()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}