@extends('layouts.app')

@section('page-title', 'Task Lists')

@section('title', 'The Task Lists')

{{-- @isset($name)
the current user is: {{ $name }}
@endisset --}}
@section('styles')
    <style>
        .task-action {
            display: flex;
            align-items: center;
        }
        .edit-btn{
          border: 1px solid #000;
          background-color: lightgray;
          color: #000;
          padding: 2px 15px;
          margin: 0 10px;
        }
    </style>
@endsection

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
                <li class="task-action">
                    <a href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a>
                    <a href="{{ route('tasks.edit', ['task' => $task->id]) }}" class="edit-btn">Edit</a>
                    <form action="{{ route('tasks.delete', ['task' => $task->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </li>
            @empty
                <li>There are not tasks!</li>
            @endforelse
        </ol>

        {{-- @else
        <div>There are not tasks!</div>
    @endif --}}
    </div>

    <div>
        @if ($tasks->count())
            {{ $tasks->links() }}
        @endif
    </div>
@endsection
