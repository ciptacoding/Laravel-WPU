@extends('dashboard.layout.main')
{{-- @dd($categories) --}}
@section('main-content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="text-dark">{{ $headTitle }}</h4>
      </div>
      <div class="mb-3">
        <a href="/dashboard/posts" class="btn btn-secondary btn-sm border-0"><i data-feather="arrow-left-circle"></i> Back to my posts</a>
      </div>
      <div class="col-lg-8">
        <form method="post" action="/dashboard/posts/{{ $post->slug }}">
          @method('put')
          @csrf 

          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}" required autofocus>
            <div class="invalid-feedback">
              @error('title')
                {{ $message }}
              @enderror
            </div>
          </div>

          <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $post->slug) }}" required>
            <div class="invalid-feedback">
              @error('slug')
                {{ $message }}
              @enderror
            </div>
          </div>

          <div class="mb-3">
            <label for="category" class="form-label">Category</label>
              <select class="form-select" name="category_id">
                @foreach ($categories as $category)
                  @if (old('category_id', $post->category_id) == $category->id)
                    <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                  @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>  
                  @endif
                @endforeach
              </select>
          </div>

          <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}" required>
            <trix-editor input="body"></trix-editor>
            @error('body')
              <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          
          <button type="submit" class="btn btn-primary btn-sm mb-5">Update Post</button>
        </form>
      </div>
    </main>

    <script>
      const title = document.querySelector('#title');
      const slug = document.querySelector('#slug');

      title.addEventListener('change', function(){
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
      });

      document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
      });
    </script>
@endsection