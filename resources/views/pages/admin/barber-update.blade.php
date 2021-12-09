@extends('layouts.public')

@section('content')
  <div class="row d-flex justify-content-center">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-body">
          <form action="{{route('barber.update', [$barber->id_barber])}}" method="POST" enctype="multipart/form-data">
            {{method_field("PUT")}}
            @csrf
            <div class="form-group">
              <label for="nama_barber">Nama barber</label>
              <input id="nama_barber" name="nama_barber" type="text" class="form-control" value="{{$barber->nama_barber}}">
            </div>

            <div class="form-group">
                <label for="alamat">Tentang barber</label>
                <textarea id="alamat" name="alamat" class="form-control">{!!$barber->alamat!!}</textarea>
            </div>

            <div class="form-group">
                <label for="link">Link Google Maps</label>
                <textarea id="link" name="link" class="form-control">{!!$barber->link!!}</textarea>
            </div>

            <button type="submit" class="btn btn-primary mb-4">
              <i class="fas fa-plus-circle"></i> Update barber
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
