@extends('layouts.auth')

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    @elseif(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    @endif
    <div class="p-4 m-3">
        <div class="text-center">
            <img src="/assets/img/outlet/logo-brother.png" alt="logo" width="80" class="center shadow-light rounded-circle mb-5 mt-2">
          </div>
        <h4 class="text-dark font-weight-normal">Welcome to <br><span class="font-weight-bold">BarberSHOP-Brother</span></h4>

        <form method="POST" action="/auth/login">
            @csrf
            <div class="form-group">
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

            <div class="form-group text-right">
            <a href="#" class="float-left mt-3">
              Forgot Password.?
            </a>
            <button type="submit" class="btn btn-warning btn-lg btn-icon icon-right" tabindex="4">
                LOGIN
            </button>
            </div>

            <div class="mt-5 text-center">
                Tidak punya akun.? <a href="{{ route('register') }}">Daftar</a>
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

    {{-- LOGIN AKUN
        admin@babershop.com::halloadmin123 -> Admin
        nandang.dev@gmail.com::nandang31 -> Customer
        kevin@gmail.com::kevin99 -> Customer --}}

@endsection
