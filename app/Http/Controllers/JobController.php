<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->Paginate(10);
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

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'tags' => 'required|array|min:1',
            'tags.*' => 'exists:tags,id', // Validate each tag ID
        ]);
        $jobListing = Job::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'salary' => $request->input('salary'),
            'location' => $request->input('location'),
            'employer_id' => 1,

        ]);
        if ($request->has('tags')) {
            $jobListing->tags()->sync($request->input('tags'));
        }
        return redirect('/jobs');

    }

    //edit
    public function edit(Job $job)
    {
        // Auth::user()->can('edit-job', $job);

        Gate::authorize('edit-job', $job);

        $job->load('tags', 'employer');
        $tags = Tag::all()->unique('name');
        $selectedTagIds = collect($job->toArray()['tags'])->pluck('id')->toArray();

        return view('jobs.edit', compact('job', 'tags', 'selectedTagIds'));
    }

    public function update(Job $job)
    {
        request()->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id', // Validate each tag ID
        ]);

//update the job
        $job->update([
            'title' => request('title'),
            'description' => request('description'),
            'salary' => request('salary'),
            'location' => request('location'),

        ]);
//persist
        if (request()->has('tags')) {
            $job->tags()->sync(request('tags'));
        }
//redirect to the job page
        return redirect('/jobs/' . $job->id);

    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect('/jobs');
    }

}