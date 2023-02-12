@extends('dashboard.layout.main')

@section('main-content')
  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h4>{{ $post->title }}</h4>
    </div>
    <div class="row">
      <div class="col-lg-8">
        <article>
          <div class="mb-2">
              <a href="/dashboard/posts" class="badge bg-secondary text-decoration-none"><i data-feather="arrow-left-circle"></i> Back to my posts</a>
              <a href="" class="badge bg-warning text-decoration-none"><i data-feather="edit"></i> Edit</a>
              <a href="" class="badge bg-danger text-decoration-none"><i data-feather="trash-2"></i> Delete</a>
          </div>         
          <img src="https://source.unsplash.com/800x400/?{{ $post->category->name }}" class="img-fluid" alt="">
            {{-- blade template without escaping --}}
          {!! $post->body !!} 
        </article>
      </div>
    </div>
  </main>
@endsection