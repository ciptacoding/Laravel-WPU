@extends('layout.main')

@section('content')
  <article>
    <h4>{{ $post->title }}</h4>
    {{-- blade template without escaping --}}
    {!! $post->body !!} 
  </article>
  <a href="/posts">Back</a>
@endsection
