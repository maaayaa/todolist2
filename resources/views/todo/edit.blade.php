@extends('layouts.default')

@section('title', 'Edit Todo')

@section('content')
<h1>
  <a href="{{ url('/') }}" class="header-menu">Back</a>

Edit Todo
</h1>
<form method="post" action="{{ url('/todos',$todo->id )}}">
  {{ csrf_field() }}
  {{ method_field('patch') }}
  <p>
    <input type="text" name="title" placeholder="enter title" value="{{ old('title',$todo->title) }}">
    @if ($errors->has('title'))
    <span class="error">{{ $errors->first('title') }}</span>
    @endif
  </p>
  <p>
    <textarea name="body" placeholder="enter body">{{ old('body',$todo->body) }}</textarea>
    @if ($errors->has('body'))
    <span class="error">{{ $errors->first('body') }}</span>
    @endif
  </p>
  <p>
    <input type="submit" value="Update">
  </p>

</form>
@endsection
