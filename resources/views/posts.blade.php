@extends('layout.main')

@section('content')
  @foreach ($posts as $post)
  <article class="mb-5 border-bottom pb-4">
    <h4><a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a></h4>
    <p>By <a href="3">{{ $post->user->name }}</a> in <a href="/category/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
    <p>{{ $post->excerpt }}</p>
    <a href="/posts/{{ $post->slug }}" class="text-decoration-none">Read More....</a>
  </article>
  @endforeach
  
@endsection
