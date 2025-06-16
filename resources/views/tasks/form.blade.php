@extends('layouts.app')

@section('page-title', isset($task) ? 'Edit Task' : 'Add Tasks')

@section('title', isset($task) ? 'Edit The Task' : 'Create A New Task')

@section('main-content')
    <form method="POST" action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.submit') }}">
        @csrf
        @isset($task)
            @method('PATCH')
        @endisset
        <div class="mb-2">
            <label for="title">Title</label>
            <input class="input-form @error('title')
              border-red-500
            @enderror " type="text"
                id="title" {{-- @class(['border-red-500' => $errors->has('title')]) --}} name="title" placeholder="Enter the task title"
                value="{{ $task->title ?? old('title') }}" />
            @error('title')
                <span class="error-msg">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-2">
            <label for="description">Description</label>
            <Textarea id="description" name="description" rows="5" @class(['border-red-500' => $errors->has('description')])
                placeholder="Enter the task description">{{ $task->description ?? old('description') }}</Textarea>
            @error('description')
                <span class="error-msg">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-2">
            <label for="long_description">Long Description</label>
            <Textarea id="long_description" name="long_description" rows="8" @class(['border-red-500' => $errors->has('long_description')])
                placeholder="Enter Long Description">{{ $task->long_description ?? old('long_description') }}</Textarea>
            @error('long_description')
                <span class="error-msg">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex items-center gap-3">

            <button type="submit" class="btn-save">
                @isset($task)
                    Update Task
                @else
                    Add Task
                @endisset
            </button>

            <a href="{{ route('tasks.index') }}" class="link mt-5">Cancel</a>
        </div>
    </form>
@endsection
