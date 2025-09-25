<?php

use Illuminate\Support\Facades\Route;

// GET -> Display
// POST -> Create
// PUT -> Modify 
// DELETE -> Delete

Route::get('/', function () {
    return 'Main Page';
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