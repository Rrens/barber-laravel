@extends('layouts.public')

@section('content')
  <div class="row d-flex justify-content-center">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-body">
          <form action="{{route('layanan.update', [$layanan->id_layanan])}}" method="POST" enctype="multipart/form-data">
            {{method_field("PUT")}}
            @csrf
            <div class="form-group">
              <label for="nama_layanan">Nama Layanan</label>
              <input id="nama_layanan" name="nama_layanan" type="text" class="form-control" value="{{$layanan->nama_layanan}}">
            </div>

            <div class="form-group">
                <label for="durasi">Durasi</label>
                <input id="durasi" name="durasi" type="text" class="form-control" value="{{$layanan->durasi}}">
              </div>

            <div class="form-group">
              <label for="harga">Harga</label>
              <input id="harga" name="harga" type="text" class="form-control" value="{{$layanan->harga}}">
            </div>


            <div class="form-group">
              <label for="thumb">Thumbnail layanan</label>
              <img src="{{asset('storage/thumbs/layanan/' . $layanan->thumb)}}" alt="" srcset="" class="img-fluid d-block mb-2" style="width: 250px">
              <input id="thumb" name="thumb" type="file" class="form-control">
            </div>

            <div class="form-group">
              <label for="deskripsi">Tentang Layanan</label>
              <textarea id="deskripsi" name="deskripsi" class="form-control summernote-simple">{!!$layanan->deskripsi!!}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-4">
              <i class="fas fa-plus-circle"></i> Update Layanan
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
