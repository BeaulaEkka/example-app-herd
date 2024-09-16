<?php

use App\Models\Job;
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
    return view('jobs.create');
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::with('tags')->find($id);
    return view('jobs.show', ['job' => $job]);
});

Route::post('/jobs', function () {
//skipped validation
    Job::create([
        'title' => request('title'),
        'description' => request('description'),
        'salary' => request('salary'),
        'location' => request('location'),
        'tags' => request('tags'),
        'employer_id' => 1,

    ]);
    return redirect('/jobs');
});

Route::get('/contact', function () {

    return view('contact');

});
