@extends('layouts.app')

@section('page-title', 'Task Detail')

@section('title', 'The Task Details')

@section('main-content')
    <h3>Title: {{ $task->title }}</h3>

    <p>Description: {{ $task->description }}</p>

    @isset($task->long_description)
        <p>{{ $task->long_description }}</p>
    @endisset
@endsection
