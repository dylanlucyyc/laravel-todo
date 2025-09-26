


<?php

use Illuninate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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
        'tasks' => \App\Models\Task::latest()->where('completed', true)->get()
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('task.create');

Route::get('/{id}', function ($id) {
    return view('show', [
      'task' => Task::findOrFail($id)
    ]);
})->name('tasks.show');

Route::post('/tasks', function(Request $request) {

    // If doesn't pass validation, Laravel will redirect user to the last page and it will set a session variable called erorr.
    // This session contain all this error info and can be used to display error next to the form inputs
    $data = $request->validate([
        'title'=> 'required|max:255',
        'description' => 'required',
        'long_description'=> 'required'
    ]);

    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];


    //tell db to run an insert query
    $task->save();

    return redirect()->route('tasks.show', ['id'=> $task->id])->with('success', 'Task created successfully!');
})-> name('tasks.store');

// Fallback route
Route::fallback(function () {
    return '404 Page';
});
