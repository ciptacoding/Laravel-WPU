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
              <a href="/dashboard/posts" class="btn btn-secondary btn-sm border-0"><i data-feather="arrow-left-circle"></i> Back to my posts</a>
              <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning btn-sm border-0"><i data-feather="edit"></i> Edit</a>
              <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger btn-sm border-0" onclick="return confirm('Are you sure?')"><i data-feather="trash-2"></i> Delete</button>
              </form>
          </div>
          @if ($post->image)
            <div style="max-width: 800px; max-height: 400px; overflow:hidden">
              <img src="{{ asset('storage/'. $post->image) }}" alt="" >
            </div>
          @else
            <img src="https://source.unsplash.com/800x400/?{{ $post->category->name }}" class="img-fluid" alt="">
          @endif         
          
            {{-- blade template without escaping --}}
          {!! $post->body !!} 
        </article>
      </div>
    </div>
  </main>
@endsection
