<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

//this has a shorthand
// Route::get('/', function () {
//     return view('home');
// });

Route::view('/', 'home');

// Route::get('/jobs', [JobController::class, 'index']);

// Route::get('/jobs/create', [JobController::class, 'create']);
// Route::delete('/jobs/{job}', [JobController::class, 'destroy']);
// Route::get('/jobs/{job}', [JobController::class, 'show']);

// Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);
// Route::post('/jobs', [JobController::class, 'store']);
// Route::patch('/jobs/{job}', [JobController::class, 'update']);

Route::view('/contact', 'contact');

//shortform
// Route::controller(JobController::class)->group(function () {
//     Route::get('/jobs', 'index');

//     Route::get('/jobs/create', 'create');
//     Route::delete('/jobs/{job}', 'destroy');
//     Route::get('/jobs/{job}', 'show');

//     Route::get('/jobs/{job}/edit', 'edit');
//     Route::post('/jobs', 'store');
//     Route::patch('/jobs/{job}', 'update');

// });

//route-resources

Route::resources('jobs', JobController::class);

/** ---------------------------------------------------------------- */
//jobs.show
// Route::get('/jobs/{id}', function ($id) {
//     $job = Job::with('tags', 'employer')->findOrFail($id)->fresh('tags');
//     $tags = $job->toArray()['tags'];

//     $tagNames = array_map(function ($tag) {
//         return $tag['name'];
//     }, $tags);

//     // dd($tagNames);
//     return view('jobs.show', compact('job', 'tagNames'));
// });

//RouteBinding
// Route::get('/jobs/{job}', function (Job $job) {
//     $job->load('tags', 'employer');
//     $tags = $job->toArray()['tags'];

//     $tagNames = array_map(function ($tag) {
//         return $tag['name'];
//     }, $tags);

//     return view('jobs.show', compact('job', 'tagNames'));
// });

/** ---------------------------------------------------------------- */
//store
// Route::post('/jobs', function (Request $request) {
//     $request->validate([
//         'title' => 'required|string|max:255',
//         'description' => 'required|string',
//         'salary' => 'required|string|max:255',
//         'location' => 'required|string|max:255',
//         'tags' => 'nullable|array',
//         'tags.*' => 'exists:tags,id', // Validate each tag ID
//     ]);
//     $jobListing = Job::create([
//         'title' => $request->input('title'),
//         'description' => $request->input('description'),
//         'salary' => $request->input('salary'),
//         'location' => $request->input('location'),
//         'employer_id' => 1,

//     ]);
//     if ($request->has('tags')) {
//         $jobListing->tags()->sync($request->input('tags'));
//     }
//     return redirect('/jobs');
// });

/** ---------------------------------------------------------------- */
//edit
// Route::get('/jobs/{id}/edit', function ($id) {
//     $job = Job::with('tags', 'employer')->findOrFail($id);
//     $tags = Tag::all()->unique('name');

//     $selectedTagIds = collect($job->toArray()['tags'])->pluck('id')->toArray();

//     return view('jobs.edit', compact('job', 'tags', 'selectedTagIds'));
// });

//edit-model mapping
// Route::get('/jobs/{job}/edit', function (Job $job) {
//     $job->load('tags', 'employer');
//     $tags = Tag::all()->unique('name');
//     $selectedTagIds = collect($job->toArray()['tags'])->pluck('id')->toArray();

//     return view('jobs.edit', compact('job', 'tags', 'selectedTagIds'));
// });

/***---------------------------------------------------------------- */
// //update
// Route::patch('/jobs/{id}', function ($id) {
//     //validate
//     request()->validate([
//         'title' => 'required|string|max:255',
//         'description' => 'required|string',
//         'salary' => 'required|string|max:255',
//         'location' => 'required|string|max:255',
//         'tags' => 'nullable|array',
//         'tags.*' => 'exists:tags,id', // Validate each tag ID
//     ]);
//     //authorize
//     //update the job
//     $job = Job::findOrFail($id);

//     $job->update([
//     'title' => request('title'),
//     'description' => request('description'),
//     'salary' => request('salary'),
//     'location' => request('location'),

//     ]);
//     //persist
//     if (request()->has('tags')) {
//         $job->tags()->sync(request('tags'));
//     }
//     //redirect to the job page
//     return redirect('/jobs/' . $job->id);
// });

//update-Model Binding
// Route::patch('/jobs/{job}', function (Job $job) {
//     //authorize
//     //validate
//     request()->validate([
//         'title' => 'required|string|max:255',
//         'description' => 'required|string',
//         'salary' => 'required|string|max:255',
//         'location' => 'required|string|max:255',
//         'tags' => 'nullable|array',
//         'tags.*' => 'exists:tags,id', // Validate each tag ID
//     ]);

//     //update the job
//     $job->update([
//         'title' => request('title'),
//         'description' => request('description'),
//         'salary' => request('salary'),
//         'location' => request('location'),

//     ]);
//     //persist
//     if (request()->has('tags')) {
//         $job->tags()->sync(request('tags'));
//     }
//     //redirect to the job page
//     return redirect('/jobs/' . $job->id);
// });

/** ---------------------------------------------------------------- */
// //Destroy
// Route::delete('/jobs/{id}', function ($id) {
//     //authorize
//     //delete the job
//     Job::findOrFail($id)->delete();

//     return redirect('/jobs');

// });

// Route::get('/contact', function () {

//     return view('contact');

// });
