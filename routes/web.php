<?php

use Illuminate\Support\Facades\Route;

// GET -> Display
// POST -> Create
// PUT -> Modify 
// DELETE -> Delete


// Pass in a second argument to pass variables to template
// HTML tags are not allowed
Route::get('/', function () {
    return view('index', [
        'name' => 'Dylan Luc'
    ]);
});

Route::get('/hello', function(){
    return 'Hello';
})->name('hello');

Route::get('/greet/{name}', function ($name) {
    return 'Hello '. $name . '!';
});

// Redirect URL 
Route::get('/hallo', function() {
    return redirect()->route('hello');
});

// Fallback route 
Route::fallback(function () {
    return '404 Page';
});