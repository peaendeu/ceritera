@extends('dashboard.layouts.main')

@section('title', 'Buat Postingan')
@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Postingan</h1>
  </div>
  <div class="col-lg-4">
    <form method="POST" action="/dasbor/postingan" class="mb-5" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="title" class="form-label">Judul</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" autocomplete="off" value="{{ old('title') }}">
        @error('title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" autocomplete="off" value="{{ old('slug') }}">
        @error('slug')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="category_id" class="form-label">Kategori</label>
        <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
          <option selected></option>
          @foreach ($categories as $category)
            @if (old('category_id') == $category->id)
              <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
            @else
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endif
          @endforeach
        </select>
        @error('category_id')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">Gambar</label>
        <img class="img-preview img-fluid" src="" alt="">
        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
        @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="body" class="form-label">Konten</label>
        <input id="body" name="body" type="hidden" value="{{ old('body') }}">
        <trix-editor input="body" class="form-control @error('body') is-invalid @enderror"></trix-editor>
        @error('body')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <button type="submit" class="btn btn-dark">Tambah</button>
    </form>
  </div>

  <script>
    document.addEventListener('trix-file-accept',(e)=>{
      e.preventDefault()
    });

    function previewImage() {
      const image = document.querySelector('#image')
      const imgPreview = document.querySelector('.img-preview')
      imgPreview.style.display = 'block'

      const blob = URL.createObjectURL(image.files[0])
      imgPreview.src = blob
      imgPreview.alt = blob
    }
  </script>
@endsection