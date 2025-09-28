<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Employer;
use App\Models\Tag;
class JobController extends Controller
{
     
public function index() {
    return view('jobs.index', [
    'jobs' => Job::with('employer', 'tags')->paginate(5)
    ]);
} 

public function create() {
    return view('jobs.create',[
        'employers' => Employer::all(),
        'tags' => Tag::all()
    ]);
} 
public function show(Job $job) {
    return view('jobs.show', [
        'job' => $job
    ]);
} 
public function store() {
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
} 

public function edit(Job $job) {
    return view('jobs.edit', [
        'job' => $job,
        'employers' => Employer::all(),
        'tags' => Tag::all()
    ]);
} 

public function update(Job $job) {
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
    return redirect('/jobs' . $job->id);
} 

public function destroy(Job $job) {
    $job->delete(); 
    return redirect('/jobs');
}
}
