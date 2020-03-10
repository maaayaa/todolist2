@extends('layouts.default')

@section('title', 'New Todo')

@section('content')
<h1>

  <a href="{{ url('/') }}" class="header-menu">Back</a>
  New Todo
</h1>
<form method="post" action="{{ url('/todos') }}">
  {{ csrf_field() }}
  <p class="mt-5">やりたい事：
    <input type="text" name="title" placeholder="enter title" value="{{ old('title') }}">
    @if ($errors->has('title'))
    <span class="error">{{ $errors->first('title') }}</span>
    @endif
  </p>
  <p>
    <textarea name="body" placeholder="enter body">{{ old('body') }}</textarea>
    @if ($errors->has('body'))
    <span class="error">{{ $errors->first('body') }}</span>
    @endif
  </p>
  <p>
    <button type="submit" class="btn btn-primary">登録</button>

    <!-- <input type="submit" value="Add"> -->
  </p>

</form>
@endsection
