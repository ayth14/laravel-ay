@extends('layouts.app')

@section('page-title', 'Add Tasks')

@section('title', 'Create A new Task')

@section('main-content')
    <form method="POST" action="{{ route('tasks.submit') }}">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" placeholder="Enter the task title" />
        </div>
        <div>
            <label for="description">Description</label>
            <input type="text" id="description" name="description" placeholder="Enter the task description" />
            <Textarea id="description" name="description" rows="5" placeholder="Enter the task description"></Textarea>
        </div>
        <div>
            <label for="long_description">Long Description</label>
            <Textarea id="long_description" name="long_description" rows="8" placeholder="Enter Long Description"></Textarea>
        </div>

        <button type="submit">Add</button>
    </form>
@endsection
