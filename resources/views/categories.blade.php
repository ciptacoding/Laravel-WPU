@extends('layout.main')
{{-- @dd($categories) --}}
@section('content')  
  <h2>Categories Posts</h2>
  <ul>
    @foreach ($categories as $category)
      <li><a href="/category/{{ $category->slug }}">{{ $category->name }}</a></li>
    @endforeach
  </ul>
@endsection