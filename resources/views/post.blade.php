@extends('layout.main')
@section('content')
<div class="container mb-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <article>
        <h4>{{ $post->title }}</h4>
        <img src="https://source.unsplash.com/800x400/?{{ $post->category->name }}" class="img-fluid" alt="">
        <p>By <a href="#">{{ $post->user->name }}</a> in <a href="/category/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>
        {{-- blade template without escaping --}}
        {!! $post->body !!} 
      </article>
      <a href="/posts">Back to post</a>
    </div>
  </div>
</div>
  
@endsection
