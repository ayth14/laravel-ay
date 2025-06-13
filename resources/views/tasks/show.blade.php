@extends('layouts.app')

@section('page-title', 'Task Detail')

@section('title', 'The Task Details')

@section('main-content')
    <div class="my-3">
        <a href="{{ route('tasks.index') }}" class="link">
            <- Back </a>
    </div>
    <h3 class="text-xl my-2"><span class="font-semibold underline decoration-blue-400">Title:</span> {{ $task->title }}
    </h3>

    <p class="my-2 text-base"><span class="font-semibold underline decoration-blue-400">Description:</span>
        {{ $task->description }}</p>

    @isset($task->long_description)
        <p class="my-2 text-base"><span class="font-semibold underline decoration-blue-400">Long Description:</span>
            {{ $task->long_description }}</p>
    @endisset
    <p class="text-sm text-slate-500 mt-4">
        <span class="font-medium">Created: </span> {{ $task->created_at->diffForHumans() }} /
        <span class="font-medium">Updated: </span> {{ $task->updated_at->diffForHumans() }}
    </p>

    <div class="flex items-center gap-3">
        <a href="{{ route('tasks.edit', ['task' => $task]) }}" class="btn-save">Edit</a>
        <form action="{{ route('tasks.delete', ['task' => $task->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-delete">Delete</button>
        </form>
    </div>
@endsection
