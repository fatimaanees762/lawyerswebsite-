<?php

use App\Http\Middleware\Admin;
use App\Http\Middleware\Lawyers;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//Admin routes and middleware
Route::middleware([Admin::class])->group(function(){

    //Route::get('/admin', function () {
    //return view('index');
//});
});

//Lawyers routes and middleware
Route::middleware([Lawyers::class])->group(function(){

});

Route::get('/adminpanel', function () {
    return view('admin.index');
});

