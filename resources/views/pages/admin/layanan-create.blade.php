@extends('layouts.public')

@section('content')
  <div class="row d-flex justify-content-center">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-body">
          <form action="{{route('layanan.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('nama_layanan') ? ' has-error' : '' }}">
              <label for="nama_layanan">Nama layanan</label>
              <input id="nama_layanan" name="nama_layanan" type="text" class="form-control">
                @error('nama_layanan')
                  <span class="has-error">
                      {{ $message }}
                  </span>
                @enderror
            </div>

            <div class="form-group {{ $errors->has('durasi') ? ' has-error' : '' }}">
              <label for="durasi">Durasi</label>
              <input id="durasi" name="durasi" type="text" class="form-control">
              @error('durasi')
                <span class="has-error">
                    {{ $message }}
                </span>
              @enderror
            </div>

            <div class="form-group{{ $errors->has('harga') ? ' has-error' : '' }}">
                <label for="harga">Harga</label>
                <input id="harga" name="harga" type="text" class="form-control">
                  @error('harga')
                    <span class="has-error">
                        {{ $message }}
                    </span>
                  @enderror
            </div>

            <div class="form-group{{ $errors->has('thumb') ? ' has-error' : '' }}">
              <label for="thumb">Thumbnail layanan</label>
              <input id="thumb" name="thumb" type="file" class="form-control">
              @error('thumb')
                <span class="has-error">
                    {{ $message }}
                </span>
              @enderror
            </div>

            <div class="form-group {{ $errors->has('deskripsi') ? ' has-error' : '' }}" >
              <label for="deskripsi">Tentang Layanan</label>
              <textarea id="deskripsi" name="deskripsi" class="form-control summernote-simple"></textarea>
              @error('deskripsi')
                <span class="has-error">
                    {{ $message }}
                </span>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary mb-4">
              <i class="fas fa-plus-circle"></i> Add Product
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
