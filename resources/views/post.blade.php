@extends('layout.main')
@section('content')
  <article>
    <h4>{{ $post->title }}</h4>
    <p>By Cipta Dwipajaya in <a href="/category/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>
    {{-- blade template without escaping --}}
    {!! $post->body !!} 
  </article>
  <a href="/posts">Back to post</a>
@endsection
