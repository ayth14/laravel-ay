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
        @forelse ($tasks as $task)
            <div>
                <a href="{{ route('tasks.show', ['id' => $task->id]) }}">{{ $task->title }}</a>
            </div>
        @empty
            <div>There are not tasks!</div>
        @endforelse
        {{-- @else
        <div>There are not tasks!</div>
    @endif --}}
    </div>
@endsection
