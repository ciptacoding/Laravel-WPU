@extends('layout.main')
{{-- @dd($categories) --}}
@section('content') 
  <div class="container">
    <div class="row">
      @foreach ($categories as $category)
          <div class="col-md-3 mb-3">
            <a href="/posts?category={{ $category->slug }}">
            <div class="card text-bg-dark">
              <img src="https://source.unsplash.com/500x400/?{{ $category->name }}" class="card-img" alt="...">
              <div class="card-img-overlay d-flex p-0">
                <h5 class="card-title flex-fill align-self-center text-center bg-dark m-0" style="--bs-bg-opacity: .5;">{{ $category->name }}</h5>
              </div>
            </div>
            </a>
          </div>
      @endforeach
    </div>
  </div>

@endsection