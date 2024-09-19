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

    public function show(Job $job)
    {
        $job->load('tags', 'employer');
        $tags = $job->toArray()['tags'];

        $tagNames = array_map(function ($tag) {
            return $tag['name'];
        }, $tags);

        return view('jobs.show', compact('job', 'tagNames'));

    }

    public function store()
    {

    }

    public function edit(Job $job)
    {
        $job->load('tags', 'employer');
        $tags = Tag::all()->unique('name');
        $selectedTagIds = collect($job->toArray()['tags'])->pluck('id')->toArray();

        return view('jobs.edit', compact('job', 'tags', 'selectedTagIds'));
    }

    public function update()
    {

    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect('/jobs');
    }

}
