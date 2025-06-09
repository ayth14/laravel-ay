@extends('layouts.app')

@section('page-title', 'Task Lists')

@section('title', 'The Task Lists')

{{-- @isset($name)
the current user is: {{ $name }}
@endisset --}}

@section('main-content')
    <div>
        {{-- @if (count($tasks)) --}}
        {{-- @foreach ($tasks as $task)
            <div>{{ $task->title }}</div>
            @endforeach --}}
        <div>
            <a href="{{ route('task.create') }}">+Add Task</a>
        </div>
        <ol>

            @forelse ($tasks as $task)
                <li>
                    <a href="{{ route('tasks.show', ['id' => $task->id]) }}">{{ $task->title }}</a>
                </li>
            @empty
                <li>There are not tasks!</li>
            @endforelse
        </ol>
        {{-- @else
        <div>There are not tasks!</div>
    @endif --}}
    </div>
@endsection
