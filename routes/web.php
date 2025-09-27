<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Models\Task;


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
        'tasks' => Task::latest()->where('completed', true)->get()
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('task.create');

Route::get('tasks/{task}/edit', function (Task $task) {
    return view('edit', [
      'task' => $task
    ]);
})->name('tasks.edit');

Route::get('/tasks/{task}', function (Task $task) {
    return view('show', [
      'task' => $task
    ]);
})->name('tasks.show');

Route::post('/tasks', function(TaskRequest $request) {
    $task = Task::create($request->validated());
    return redirect()->route('tasks.show', ['task'=> $task->id])->with('success', 'Task created successfully!');
})-> name('tasks.store');

Route::put('/tasks/{task}', function(Task $task, TaskRequest $request) {

    $task->update($request->validated());

    return redirect()->route('tasks.show', ['task'=> $task->id])->with('success', 'Task updated successfully!');
})-> name('tasks.update');

// Fallback route
Route::fallback(function () {
    return '404 Page';
});
