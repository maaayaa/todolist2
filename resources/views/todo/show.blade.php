@extends('layouts.default')
@section('title', $todo->title)

@section('content')
<h1>
  <a href="{{ url('/') }}" class="header-menu">Back</a>
  {{ $todo->title }}</h1>
<p>{!! nl2br(e($todo->body)) !!}</p>

<h2>Comments</h2>
<ul>
  @forelse ($todo->comments as $comment)
  <li>
    {{ $comment->body }}
    <a href="#" class="del" data-id="{{ $comment->id }}">[x]</a>
    <form method="post" action="{{ action('CommentsController@destroy',[$todo,$comment])}}" id="form_{{ $comment->id }}">
      {{ csrf_field() }}
      {{ method_field('delete') }}
    </form>
  </li>
  @empty
  <li>No comments yet</li>
  @endforelse
</ul>
<form method="post" action="{{ action('CommentsController@store',$todo) }}">
  {{ csrf_field() }}
  <p>
    <input type="text" name="body" placeholder="enter comment" value="{{ old('body') }}">
    @if ($errors->has('body'))
    <span class="error">{{ $errors->first('body') }}</span>
    @endif
  </p>
  <p>
    <input type="submit" value="Add Comment">
  </p>

</form>
<script src="/js/main.js"></script>

@endsection
