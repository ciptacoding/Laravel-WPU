@extends('layout.main')
{{-- @dd($posts) --}}
@section('content')

@if ($posts->count()>0)
  <div class="card text-center shadow-sm">
    <div class="card-body p-0">
      <img src="https://source.unsplash.com/1200x400/?{{ $posts[0]->category->name }}" class="card-img-top" alt="...">
      <div class="mb-4 mt-2 px-5">
        <h3 class="card-title"><a href="posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark"><?= $posts[0]->title ?></a></h3>
        <p>
          <small class="text-muted">
          By <a href="/authors/{{ $posts[0]->user->username }}">{{ $posts[0]->user->name }}</a> 
          in <a href="/category/{{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a>
          {{ $posts[0]->created_at->diffForHumans() }}
          </small>
        </p>
        <p class="card-text">
          <?= $posts[0]->excerpt ?><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none"> Read More....</a>
        </p>
      </div>
    </div>
  </div>

  <div class="container mt-3 px-0">
    <div class="row">
      @foreach ($posts->skip(1) as $post)
        <div class="col-md-4 mb-3">
          <div class="card shadow-sm" style="height: 25rem;">
            <div class="bg-dark rounded text-white position-absolute px-2 py-1" style="--bs-bg-opacity: .5;">
              <a href="/category/{{ $post->category->slug }}" class="text-decoration-none text-white">{{ $post->category->name }}</a>
            </div>
            <img src="https://source.unsplash.com/800x400/?{{ $post->category->name }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><a href="/posts/{{ $post->slug }}" class="text-decoration-none text-dark">{{ $post->title }}</a></h5>
              <p>
                <small class="text-muted">
                By <a href="/authors/{{ $post->user->username }}">{{ $post->user->name }}</a>
                {{ $post->created_at->diffForHumans() }}
                </small>
              </p>
              <p class="card-text">
                <?= $post->excerpt ?><a href="/posts/{{ $post->slug }}" class="text-decoration-none"> Read More....</a>
              </p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@else
    <p>Posts not found.</p>
@endif
  
@endsection
