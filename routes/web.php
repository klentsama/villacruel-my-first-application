<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});


Route::get('/home', function () {
    return view('home');
});

// All Jobs
Route::get('/jobs', function () {
return view('jobs', [
'jobs' => Job::all()
]);
});


// Single Job - using a Route Wildcard
Route::get('/jobs/{id}', function ($id) {
    return view('job', [
    'job' => Job::find($id)
    ]);
});


Route::get('/users', function(){
    return view('users');
});

