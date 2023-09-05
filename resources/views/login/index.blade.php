@extends('layouts.main')

@section('title', 'Masuk')
@section('content')
  <div class="row justify-content-center">
    <div class="col-md-4">
      <main class="form-signin">
        <h1 class="h3 mb-3 fw-normal text-center">Masukkan Akun</h1>
        @if (session()->has('success'))
          <div class="alert alert-dark alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        @if (session()->has('failed'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('failed') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <form class="my-2" action="/masuk" method="POST">
          @csrf
          <div class="form-floating">
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" autocomplete="off" value="{{ old('email') }}">
            <label for="email">Surat Elektronik</label>
            @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" autocomplete="off">
            <label for="password">Kata Sandi</label>
            @error('password')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <button class="w-100 btn btn-lg btn-dark mt-2" type="submit">Masuk</button>
        </form>
        <small class="d-block text-center">Belum punya akun? <a href="/daftar" class="text-dark text-decoration-none">Daftar di sini.</a></small>
        <p class="my-1 text-center text-muted">&copy;2023</p>
      </main>
    </div>
  </div>
@endsection