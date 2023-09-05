@extends('dashboard.layouts.main')

@section('title', 'Postingan')
@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Postingan</h1>
  </div>

  @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show col-md-5" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <div class="table-responsive">
    <a href="/dasbor/postingan/create" class="btn btn-dark mb-2">Tambah Postingan</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th class="col-md-1">#</th>
          <th class="col-md-6">Judul</th>
          <th class="col-md-2">Kategori</th>
          <th class="col-md-2">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $post->title }}</td>
          <td>{{ $post->category->name }}</td>
          <td>
            <a href="/dasbor/postingan/{{ $post->slug }}" class="badge bg-dark text-white"><span data-feather="file-text"></span></a>
            <a href="/dasbor/postingan/{{ $post->slug }}/edit" class="badge bg-dark text-white"><span data-feather="edit"></span></a>
            <form action="/dasbor/postingan/{{ $post->slug }}" method="POST" class="d-inline">
              @csrf
              @method('delete')
              <button class="badge bg-dark border-0" type="submit" onclick="return confirm('Apakah anda akan menghapus data no. {{ $loop->iteration }}?')"><span data-feather="trash"></span></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection