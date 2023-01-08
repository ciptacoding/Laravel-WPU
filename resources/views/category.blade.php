@extends('layout.main')

@section('content')
  <h2 class="mb-5">Post Category : {{ $category }}</h2>
    @foreach ($posts as $post )
      <article class="mt-2">
        <h4><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h4>
        <p>{{ $post->excerpt }}</p>
      </article>
      <hr>
    @endforeach
    <a href="/categories">Back to categories</a>
@endsection