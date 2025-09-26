@extends('layouts.app')

@section('title','Add task')

@section('content')
    <form method="POST" action="{{route('tasks.store')}}">
        @csrf
        <div>
            <lable for="title">
                Title
            </lable>
            <input text="text" name="title" id="title" />
        </div>

         <div>
            <lable for="description">
                Description
            </lable>
            <textarea name="description" id="description" rows="5"></textarea>
        </div>

         <div>
            <lable for="long_description">
                Long Description
            </lable>
            <textarea name="description" id="description" rows="10"></textarea>
        </div>

        <div>
            <button type="submit">Add Task</button>
        </div>
    </form>
@endsection
