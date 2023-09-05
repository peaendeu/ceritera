@extends('layouts.main')

@section('title', 'Terkini')
@section('content')
  <div class="row justify-content-center">
    <div class="col-md-4">
      <form action="/terkini">
        @if (request('kategori'))
          <input type="hidden" name="kategori" id="kategori" value="{{ request('kategori') }}">
        @endif
        @if (request('penulis'))
          <input type="hidden" name="penulis" id="penulis" value="{{ request('penulis') }}">
        @endif
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Cari cerita..." id="cari" name="cari" value="{{ request('cari') }}">
          <button class="btn btn-outline-dark" type="submit"><i class="bi bi-search"></i></button>
        </div>
      </form>
    </div>
  </div>

  @if ($posts->count())
    <div class="card mb-3 text-center">
      @if ($posts[0]->image)
        <div style="max-height: 350px; overflow: hidden">
          <a href="{{ asset('/storage/' . $posts[0]->image) }}" data-toggle="lightbox">
            <img src="{{ asset('/storage/' . $posts[0]->image) }}" class="card-img-top img-thumbnail" alt="{{ asset('/storage/' . $posts[0]->image) }}">
          </a>
        </div>
      @else
        <div style="max-height: 350px; overflow: hidden;">
          <a href="https://source.unsplash.com/1200x768.jpg?{{ $posts[0]->category->name }}" data-toggle="lightbox">
            <img src="https://source.unsplash.com/1200x768.jpg?{{ $posts[0]->category->name }}" class="card-img-top" alt="https://source.unsplash.com/1200x400.jpg?{{ $posts[0]->category->name }}">
          </a>
        </div>
      @endif
      <div class="card-body">
        <h3 class="card-title">
          <a href="/terkini/{{ $posts[0]->slug }}" class="text-dark text-decoration-none">{{ $posts[0]->title }}</a>
        </h3>
        <p>
          <small>oleh <a href="/terkini?penulis={{$posts[0]->author->username }}" class="text-dark text-decoration-none">{{$posts[0]->author->name }}</a> 
          kategori <a href="/terkini?kategori={{$posts[0]->category->slug }}" class="text-dark text-decoration-none">{{$posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}
          </small>
        </p>
        <p class="card-text">{{ $posts[0]->excerpt }}</p>
      </div>
    </div>
  
    <div class="container">
      <div class="row">
        @foreach ($posts->skip(1) as $post)
          <div class="col-md-6 mb-3">
            <div class="card">
              <div class="position-absolute p-2" style="background-color: rgba(0, 0, 0, 0.5);"><a href="/terkini?kategori={{ $post->category->slug }}" class="text-decoration-none text-white">{{ $post->category->name }}</a></div>
              @if ($post->image)
                <div style="max-height: 250px; overflow: hidden">
                  <a href="{{ asset('/storage/' . $post->image) }}" data-toggle="lightbox">
                    <img src="{{ asset('/storage/' . $post->image) }}" class="card-img-top img-thumbnail" alt="{{ asset('/storage/' . $post->image) }}">
                  </a>
                </div>
              @else
                <div style="max-height: 250px; overflow: hidden">
                  <a href="https://unsplash.it/1200/768.jpg?{{ $post->category->name }}" data-toggle="lightbox">
                    <img src="https://unsplash.it/1200/768.jpg?{{ $post->category->name }}" class="card-img-top" alt="https://unsplash.it/1200/768.jpg?{{ $post->category->name }}">
                  </a>
                </div>
              @endif
              <div class="card-body">
                <h5 class="card-title">
                  <a href="/terkini/{{ $post->slug }}" class="text-dark text-decoration-none">{{ $post->title }}</a>
                </h5>
                <p class="card-text">{{ $post->excerpt }}</p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  @else
    <p class="text-center fs-4">No post found.</p>
  @endif

  <div class="d-flex justify-content-center">
    {{ $posts->links() }}
  </div>
@endsection