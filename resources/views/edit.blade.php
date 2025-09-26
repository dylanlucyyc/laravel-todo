@extends('layouts.app')

@section('title','Edit task')

@section('styles')
<style>
    .error-message{
        color: red;
        font-size: 0.8rem;
    }
</style>
@endsection

@section('content')
    <form method="POST" action="{{route('tasks.update',['id' => $task->id])}}">
        @csrf
        @method('PUT')
        <div>
            <lable for="title">
                Title
            </lable>
            <input text="text" name="title" id="title" value="{{ $task->title }}" />
            @error('title')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

         <div>
            <lable for="description">
                Description
            </lable>
            <textarea name="description" id="description" rows="5">{{ $task->description }}</textarea>
             @error('description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

         <div>
            <lable for="long_description">
                Long Description
            </lable>
            <textarea name="long_description" id="long_description" rows="10">{{ $task->long_description }}</textarea>
             @error('long_description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit">Edit Task</button>
        </div>
    </form>
@endsection
