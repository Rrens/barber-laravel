@extends('layouts.auth')

@section('content')
<div class="p-2 m-3">
    <div class="text-center">
        <img src="/assets/img/outlet/logo-brother.png" alt="logo" width="80" class="shadow-light rounded-circle mb-2">
      </div>
    <h4 class="text-dark font-weight-normal">Register<br></h4>

    <form method="POST" action="/auth/register">
        @csrf
        <div class="form-group mb-1">
            <label for="name">Nama</label>
            <input id="name" type="text" class="form-control @error('name')is-invalid @enderror" name="name"
                value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group mb-1">
            <label for="username">Username</label>
            <input id="username" type="text" class="form-control @error('username')is-invalid @enderror"
                name="username" value="{{ old('username') }}" required>
            @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group mb-1">
            <label for="alamat">Alamat</label>
            <input id="alamat" type="text" class="form-control @error('alamat')is-invalid @enderror" name="alamat"
                value="{{ old('alamat') }}" required>
            @error('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group mb-1">
            <label for="nohp">No HP</label>
            <input id="nohp" type="text" class="form-control @error('nohp')is-invalid @enderror" name="nohp"
                value="{{ old('nohp') }}" required>
            @error('nohp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group mb-1">
            <label for="email">Email</label>
            <input id="email" type="email" class="form-control @error('email')is-invalid @enderror" name="email"
                value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <div class="d-block">
                <label for="password" class="control-label">Password</label>
            </div>
            <input id="password" type="password" class="form-control @error('password')is-invalid @enderror"
                name="password" value="{{ old('password') }}" required>
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-warning btn-lg btn-block" tabindex="4">
                REGISTER
            </button>
        </div>

        <div class="mt-5 text-center">
            Sudah punya akun .? <a href="{{ route('login') }}">Masuk</a>
        </div>
    </form>

    <div class="text-center mt-3 text-small">
      Copyright &copy; 2021. Made with 💙 by laravia
      <div class="mt-1">
        <a href="#">Privacy Policy</a>
        <div class="bullet"></div>
        <a href="#">Terms of Service</a>
      </div>
    </div>
  </div>
</div>
@endsection
