<?php

use App\Http\Requests\TaskPlusRequest;
use App\Models\TaskPlus;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function() {
    return view('index', [
        'tasks' => TaskPlus::latest()->paginate(7)
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{task}/edit', function (TaskPlus $task) {
    return view('edit', ['task' => $task]);
})->name('tasks.edit');

Route::get('/tasks/{task}', function (TaskPlus $task) {
    return view('show', ['task' => $task]);    
})->name('tasks.show');

Route::post('/tasks', function (TaskPlusRequest $request) {
    $task = TaskPlus::create($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])
    ->with('success', 'task created');
})->name('tasks.store');

Route::put('/tasks/{task}', function(TaskPlus $task, TaskPlusRequest $request) {
    $task->update($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'task updated!');

})->name('tasks.update');

Route::delete('/tasks/{task}', function(TaskPlus $task){
    $task->delete();

    return redirect()->route('tasks.index')
    ->with('success', 'task deleted!!');
})->name('tasks.destroy');

Route::put('tasks/{task}/toggle-btn', function (TaskPlus $task) {
    $task->toggleComplete();

    return redirect()->back()->with('success', 'task toggled with success');
})->name('tasks.toggle-btn');

