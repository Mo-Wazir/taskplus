@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <div>
        <a href="{{ route('tasks.index') }}">Back to My tasks' list ?</a>
    </div>

    <p>{{ $task->descr }}</p>

    @if ($task->long_descr)
        <p>{{ $task->long_descr }}</p>
    @endif

    <p>Created at {{ $task->created_at->diffForHumans() }} Updated: {{ $task->updated_at->diffForHumans() }} </p>

    <p>
        @if ($task->completed)
           <span>Task Completed!</span> 
        @else
        <span>Task not Completed!</span>
        @endif
    </p>

    <div>
        <a href="{{ route('tasks.edit', ['task' => $task]) }}"> Edit </a>
    </div>

    <form action="{{ route('tasks.toggle-btn', ['task' => $task]) }}" method="post">
        @csrf
        @method('PUT')
        <button type="submit">
            Mark as {{ $task->completed ? 'not completed' : 'completed' }}
        </button>
    </form>

    <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit">
            delete task
        </button>
    </form>

@endsection

