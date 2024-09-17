<?php

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(3);
    return view('jobs.index', [
        'jobs' => $jobs,

    ]);
});
Route::get('/jobs/create', function () {
    $tags = Tag::all()->unique('name');
    return view('jobs.create', compact('tags'));
});

//jobs.show
Route::get('/jobs/{id}', function ($id) {
    $job = Job::with('tags', 'employer')->findOrFail($id)->fresh('tags');
    $tags = $job->toArray()['tags'];

    $tagNames = array_map(function ($tag) {
        return $tag['name'];
    }, $tags);

    // dd($tagNames);
    return view('jobs.show', compact('job', 'tagNames'));
});

//edit
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::with('tags', 'employer')->findOrFail($id);
    $tags = Tag::all()->unique('name'); // Get all tags to populate the select options
    $jobTagIds = $job->tags ? $job->tags->pluck('id')->toArray() : [];

    return view('jobs.edit', compact('job', 'tags', 'jobTagIds'));
});

Route::post('/jobs', function (Request $request) {
//skipped validation

    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'salary' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'tags' => 'nullable|array',
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
});

Route::get('/contact', function () {

    return view('contact');

});
