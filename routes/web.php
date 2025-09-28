<?php

use App\Http\Controllers\JobController;
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

Route::resource('jobs', JobController::class); 


Route::get('/users', function(){
    return view('users');
});

