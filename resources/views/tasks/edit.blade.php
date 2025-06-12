@extends('layouts.app')

@section('main-content')
    @include('tasks.form', ['task' => $task])
@endsection
