@extends('layouts.public')

@section('content')
  <div class="row d-flex justify-content-center">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-body">
          <form action="{{route('barber.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('nama_barber') ? ' has-error' : '' }}">
              <label for="nama_barber">Nama barber</label>
              <input id="nama_barber" name="nama_barber" type="text" class="form-control">
                @error('nama_barber')
                  <span class="has-error">
                      {{ $message }}
                  </span>
                @enderror
            </div>

            <div class="form-group {{ $errors->has('alamat') ? ' has-error' : '' }}" >
                <label for="alamat">Alamat Barber</label>
                <textarea id="alamat" name="alamat" class="form-control"></textarea>
                @error('alamat')
                  <span class="has-error">
                      {{ $message }}
                  </span>
                @enderror
            </div>

            <div class="form-group {{ $errors->has('link') ? ' has-error' : '' }}" >
              <label for="link">Link Google Maps</label>
              <textarea id="link" name="link" class="form-control"></textarea>
              @error('link')
                <span class="has-error">
                    {{ $message }}
                </span>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary mb-4">
              <i class="fas fa-plus-circle"></i> Add Outlet
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
