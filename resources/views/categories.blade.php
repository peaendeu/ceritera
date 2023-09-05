@extends('layouts.main')

@section('title', 'Category')
@section('content')
  @foreach ($categories as $category)
    <article>
      <h4><a href="/categories/{{ $category->slug }}" class="text-dark text-decoration-none">{{ $category->name }}</a></h4>
    </article>
  @endforeach
@endsection