@extends('layouts.app')

@section('page-title', isset($task) ? 'Edit Task' : 'Add Tasks')

@section('title', isset($task) ? 'Edit The Task' : 'Create A New Task')

@section('styles')
    <style>
        .error-msg {
            color: red;
            font-size: 12px;
        }
    </style>


@endsection
@section('main-content')
    <form method="POST" action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.submit') }}">
        @csrf
        @isset($task)
            @method('PATCH')
        @endisset
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" placeholder="Enter the task title"
                value="{{ $task->title ?? old('title') }}" />
            @error('title')
                <span class="error-msg">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <Textarea id="description" name="description" rows="5" placeholder="Enter the task description">{{ $task->description ?? old('description') }}</Textarea>
            @error('description')
                <span class="error-msg">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="long_description">Long Description</label>
            <Textarea id="long_description" name="long_description" rows="8" placeholder="Enter Long Description">{{ $task->long_description ?? old('long_description') }}</Textarea>
            @error('long_description')
                <span class="error-msg">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit">
            @isset($task)
                Update Task
            @else
                Add Task
            @endisset
        </button>
    </form>
@endsection
