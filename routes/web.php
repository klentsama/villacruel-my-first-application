<?php

use App\Models\Employer;
use Illuminate\Support\Facades\Route;
use App\Models\Job;
use App\Models\Tag;

Route::get('/', function () {
    return view('home');
});


Route::get('/home', function () {
    return view('home');
});

//Show Create Form
Route::get('/jobs/create', function(){
    return view('jobs.create',[
        'employers' => Employer::all(),
        'tags' => Tag::all()
    ]);
})->name('jobs.create');


Route::get('/jobs', function () {
return view('jobs.index', [
    'jobs' => Job::with('employer', 'tags')->paginate(5)
]);
})->name('jobs.index');


Route::get('/jobs/{job}', function (\App\Models\Job $job) { 
return view('jobs.show', ['job' => $job]); // Changed 
});

// Store a New Job 
Route::post('/jobs', function () { 
    request()->validate([ 
        'title' => ['required', 'min:3'], 
        'salary' => ['required'],
        'employer_id' => ['required'],
        'tags' => ['required']
    ]); 
 
    $job = Job::create([
    'title' => request('title'), 
    'salary' => request('salary'), 
    'employer_id' => request('employer_id'),
]);

// Attach tags (if provided)
if (request('tags')) {
    $job->tags()->sync(request('tags'));
}

 
    return redirect('/jobs'); 
})->name('jobs.store');

// Show Edit Form 
Route::get('/jobs/{job}/edit', function (\App\Models\Job $job) { 
    return view('jobs.edit', [
        'job' => $job,
        'employers' => Employer::all(),
        'tags' => Tag::all()
    ]); 
})->name('jobs.edit');

// Update a Job 
Route::patch('/jobs/{job}', function (\App\Models\Job $job) { 
    $validated = request()->validate([ 
        'title' => ['required', 'min:3'], 
        'salary' => ['required'],
        'employer_id' => ['required'],
        'tags' => ['array'] // should be array of tag IDs
    ]); 

    // ✅ Update existing job
    $job->update([
        'title' => $validated['title'], 
        'salary' => $validated['salary'], 
        'employer_id' => $validated['employer_id'],
    ]); 

    // ✅ Sync tags (pivot table)
    if (isset($validated['tags'])) {
        $job->tags()->sync($validated['tags']);
    }

    // ✅ Correct redirect
    return redirect('/jobs' . $job->id)->with('success', 'Job updated successfully!');
})->name('jobs.update');


// Destroy a Job 
Route::delete('/jobs/{job}', function (\App\Models\Job $job) { 
    
    $job->delete(); 
    return redirect('/jobs'); 

})->name('jobs.delete');



Route::get('/users', function(){
    return view('users');
});

