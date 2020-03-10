@extends('layouts.default')
{{--
@section('title')
Todo lists
@endsection
--}}

@section('title','Todo lists')

@section('content')
<h1>
  <a href="{{ url('/todos/create') }}" class="header-menu">New Todo</a>
  Todo lists</h1>
<ul>
  @forelse ($todos as $todo)
  <li>
    <a href="{{ action('TodoController@show', $todo)}}">{{ $todo->title }}</a>
    <a href="{{ action('TodoController@edit', $todo)}}" class="edit">[Edit]</a>
    <a href="#" class="del" data-id="{{ $todo->id }}">[x]</a>
    <form method="post" action="{{ url('/todos',$todo->id)}}" id="form_{{ $todo->id }}">
      {{ csrf_field() }}
      {{ method_field('delete') }}
    </form>
  </li>
  @empty
  <li>No todos yet</li>
  @endforelse
</ul>
<script src="/js/main.js"></script>

@endsection
