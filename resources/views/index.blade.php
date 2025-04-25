{{-- @dd($tasks) --}}
@extends('layouts.app')

@section('title', 'Task Plus')

@section('content')

<nav class="mb-4">
    <a href="{{ route('tasks.create') }}">Add task</a>
</nav>

    @forelse ($tasks as $task )
    
        <div>
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}" @class(['font-bold', 'line-through' => $task->completed])> {{ $task->title }} </a>
        </div>
    @empty
        <div> Nothing tasky, nothing to task you, create one now! </div>
    @endforelse

    @if ($tasks->count())
        {{ $tasks->links() }}
    @endif

@endsection
