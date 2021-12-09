@extends('layouts.public')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_barber" class="control-label">Nama barber</label>
                        <input id="nama_barber" name="nama_barber" type="text" class="form-control"
                            value="{{ $barber->nama_barber }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="alamat">alamat</label>
                        <input id="alamat" name="alamat" type="text" class="form-control" value="{{ $barber->alamat }}" readonly>
                    </div>

                    <div class="form-group">
                        {{-- <label for="link">Link & View in Google Maps</label> --}}
                        <iframe src="{{$barber->link}}" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>



                </div>
            </div>
        </div>
    </div>
@endsection
