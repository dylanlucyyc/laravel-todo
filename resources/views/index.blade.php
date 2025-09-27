@extends('layouts.app')

@section('title', 'TO DO - LARAVEL')

@section('content')
          @if(count($tasks))
                    <ul>
                              @foreach ($tasks as $task)
                              <li> <a href="{{ route('tasks.show',['task' => $task->id]) }}">{{ $task->title }}</a></li>
                              @endforeach
                    </ul>

          @else
                    <div>There are no tasks</div>
          @endif
@endsection
