@extends('layouts.app')

@section('page-title', 'Add Tasks')

@section('title', 'Create A new Task')

@section('styles')
<style>

  .error-msg{
    color: red;
    font-size: 12px;
  }
</style>


@endsection
@section('main-content')
    <form method="POST" action="{{ route('tasks.submit') }}">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" placeholder="Enter the task title" value="{{ old('title') }}"/>
            @error('title')
                <span class="error-msg">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <Textarea id="description" name="description" rows="5" placeholder="Enter the task description">{{ old('description') }}</Textarea>
            @error('description')
                <span class="error-msg">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="long_description">Long Description</label>
            <Textarea id="long_description" name="long_description" rows="8" placeholder="Enter Long Description">{{ old('long_description') }}</Textarea>
            @error('long_description')
                <span class="error-msg">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit">Add</button>
    </form>
@endsection
