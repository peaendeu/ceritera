@extends('dashboard.layouts.main')

@section('title', 'Pos')
@section('container')
<div class="container">
  <div class="row my-2">
    <div class="col-lg-10 pb-5">
      <article>
        <h1 class="mb-3">{{ $post->title }}</h1>
        @if ($post->image)
          <div style="max-height: 350px; overflow: hidden">
            <a href="{{ asset('/storage/' . $post->image) }}" data-toggle="lightbox">
              <img src="{{ asset('/storage/' . $post->image) }}" class="card-img-top img-thumbnail" alt="{{ asset('/storage/' . $post->image) }}">
            </a>
          </div>
        @else
          <div style="max-height: 350px; overflow: hidden">
            <a href="https://unsplash.it/1200/768.jpg?{{ $post->category->name }}" data-toggle="lightbox">
              <img src="https://unsplash.it/1200/768.jpg?{{ $post->category->name }}" class="card-img-top img-thumbnail" alt="https://source.unsplash.com/1200x400?{{ $post->category->name }}">
            </a>
          </div>
        @endif
        <div class="my-3"></div>
        {!! $post->body !!}
      </article>
      <a href="/dasbor/postingan" class="text-dark text-decoration-none"><i class="bi bi-arrow-left btn btn-sm btn-dark mt-3"></i></a>
    </div>
  </div>
</div>
@endsection