@extends('layouts.main')

@section('title', 'Daftar')
@section('content')
  <div class="row justify-content-center">
    <div class="col-md-4">
      <main class="form-registration">
        <h1 class="h3 mb-3 fw-normal text-center">Daftar Akun</h1>
        <form action="/daftar" method="POST">
          @csrf
          <div class="form-floating">
            <input type="text" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" name="name" autocomplete="off" value="{{ old('name') }}">
            <label for="name">Nama</label>
            @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username"autocomplete="off" value="{{ old('username') }}">
            <label for="username">Nama Pengguna</label>
            @error('username')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" autocomplete="off" value="{{ old('email') }}">
            <label for="email">Surat Elektronik</label>
            @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" autocomplete="off" value="{{ old('') }}">
            <label for="password">Kata Sandi</label>
            @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <button class="w-100 btn btn-lg btn-dark mt-4 mb-2" type="submit">Daftar</button>
        </form>
        <small class="d-block text-center"><a href="/masuk" class="text-dark text-decoration-none">Masuk ke Ceritera.</a></small>
        <p class="my-1 text-center text-muted">&copy;2023</p>
      </main>
    </div>
  </div>
@endsection