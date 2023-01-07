@extends('layout.main')

@section('content')
  @foreach ($posts as $post)
  <article class="mt-2">
    <h4><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h4>
    <p>{{ $post->excerpt }}</p>
  </article>
  <hr>
  @endforeach
  
@endsection
