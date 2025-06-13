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
        <nav class="my-3">
            <a class="link" href="{{ route('task.create') }}">
                + Add task
            </a>
        </nav>
        <ol>

            @forelse ($tasks as $task)
                <li
                    class="flex items-center mb-2 border-dashed border-black border-2 p-2 max-w-fit rounded-md {{ $task->completed ? 'bg-green-400' : 'bg-red-400' }}">
                    <form action="{{ route('tasks.status', ['task' => $task]) }}" method="POST" class="pr-2">
                        @csrf
                        @method('PUT')
                        <input type="checkbox" name="task-status" id="taskStatus" {{ $task->completed ? 'checked' : '' }}
                            onchange="this.form.submit()">
                    </form>
                    <a href="{{ route('tasks.show', ['task' => $task->id]) }}" @class([
                        'font-semibold' => !$task->completed,
                        'line-through' => $task->completed,
                    ])>
                        {{ $task->title }}
                    </a>
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
