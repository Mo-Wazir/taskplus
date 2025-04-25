@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add new Task')

@section('content')
    
    <form action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store')  }}" method="post">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset

        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $task->title ?? old('title') }}">
            @error('title')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="descr">Your Description</label>
            <textarea name="descr" id="descr" cols="5" rows="5">{{ $task->descr ?? old('descr') }}</textarea>
            @error('descr')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="long_descr">Long Description</label>
            <textarea name="long_descr" id="long_descr"  cols="5" rows="5">{{ $task->long_descr ?? old('long_descr') }}</textarea>
            @error('long_descr')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit">
                @isset($task)
                    Update Task
                @else
                    Add Task
                @endisset
            </button>
        <a href="{{ route('tasks.index') }}">Cancel</a>
        </div>
    </form>

@endsection
