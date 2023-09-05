@extends('layouts.main')

@section('title', 'Category')
@section('content')
  <div class="col-md-6">
    <h3 class="border-bottom mb-3 pb-3">{{ $category }}</h3>
    @foreach ($posts as $post)
      <article>
        <h4><a href="/post/{{ $post->slug }}" class="text-dark text-decoration-none">{{ $post->title }}</a></h4>
        <p>{{ $post->excerpt }}</p>
      </article>
    @endforeach
  </div>
@endsection