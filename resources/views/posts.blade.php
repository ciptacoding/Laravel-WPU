@extends('layout.main')
{{-- @dd($posts) --}}

@section('content')
  <div class="row justify-content-center">
    <div class="col-md-6 ">
      <form action="/posts" method="GET">
        @if (request('category'))
          <input type="hidden" name="category" value="{{ request('category') }}">
        @endif
        @if (request('user'))
          <input type="hidden" name="user" value="{{ request('user') }}">
        @endif
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Search posts..." name="search" value="{{ request('search') }}">
          <button class="btn btn-dark" type="submit" id="button-addon2">Search</button>
        </div>
      </form>
    </div>
  </div>   

@if ($posts->count()>0)
  <div class="card text-center shadow-sm">
    <div class="card-body p-0">
      <img src="https://source.unsplash.com/1200x300/?{{ $posts[0]->category->name }}" class="card-img-top" alt="...">
      <div class="mb-4 mt-2 px-5">
        <h3 class="card-title"><a href="posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark"><?= $posts[0]->title ?></a></h3>
        <p>
          <small class="text-muted">
          By <a href="/posts?user={{ $posts[0]->user->username }}">{{ $posts[0]->user->name }}</a> 
          in <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a>
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
              <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none text-white">{{ $post->category->name }}</a>
            </div>
            <img src="https://source.unsplash.com/800x400/?{{ $post->category->name }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><a href="/posts/{{ $post->slug }}" class="text-decoration-none text-dark">{{ $post->title }}</a></h5>
              <p>
                <small class="text-muted">
                By <a href="/posts?user={{ $post->user->username }}">{{ $post->user->name }}</a>
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
  {{ $posts->links() }}
@else
    <p class="text-center">Posts not found.</p>
@endif
  
@endsection
