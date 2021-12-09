@extends('layouts.public')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_layanan" class="control-label">Nama layanan</label>
                        <input id="nama_layanan" name="nama_layanan" type="text" class="form-control"
                            value="{{ $layanan->nama_layanan }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input id="harga" name="harga" type="text" class="form-control" value="{{ $layanan->harga }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="durasi">durasi (gram)</label>
                        <input id="durasi" name="durasi" type="text" class="form-control" value="{{ $layanan->durasi }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="thumb">Thumbnail layanan</label>
                        <img src="{{ asset('storage/thumbs/layanan/' . $layanan->thumb) }}" alt="" srcset=""
                            class="img-fluid d-block mb-2" style="width: 250px">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi" class="control-label">Deskripsi layanan</label>
                        <div>
                            {!! $layanan->deskripsi !!}
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
