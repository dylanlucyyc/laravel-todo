


<?php

use Illuninate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function(){
    return redirect()->route('tasks.index');
});

// Pass in a second argument to pass variables to template
// HTML tags are not allowed
Route::get('/tasks', function () {
    return view('index', [
        //get the most recent class based on its timestamp: latest()->get()
        //all the tasks: all()
        //all the latest tasks with completed = true: latest()->where('completed', true)->get()
        'tasks' => \App\Models\Task::latest()->where('completed', true)->get()
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('task.create');

Route::get('/{id}', function ($id) {
    return view('show', [
      'task' => \App\Models\Task::findOrFail($id)
    ]);
})->name('tasks.show');

Route::post('/tasks', function(Request $request) {
    dd($request->all());
})-> name('tasks.store');

// Fallback route
Route::fallback(function () {
    return '404 Page';
});
