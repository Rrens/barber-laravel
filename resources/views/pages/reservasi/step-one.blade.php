@extends('layouts.public')

@section('content')

<div class="row">

    {{-- <div class="col-12 col-md-6 col-lg-6">

        <div class="card">
                  <div class="card-header">
                    <h4>Layanan</h4>
                  </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Layanan yang tersedia</label>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                                @php
                                    $layanan = DB::table('layanan')->get();
                                @endphp
                                @if (!empty($layanan))
                                    @foreach ($layanan as $data)
                                        <div class="row gutters-sm">
                                            <div class="col-6 col-sm-4">
                                                <h6>{{ $data->nama_layanan }}</h6>
                                                <label class="imagecheck mb-4">
                                                    <input name="imagecheck" type="checkbox" value="1" class="imagecheck-input"  />
                                                    <figure class="imagecheck-figure">
                                                        <img src="{{asset('storage/thumbs/layanan/' . $data->thumb)}}" alt="}" class="imagecheck-image">
                                                    </figure>
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                @endif
                    </div>
                </div>
        </div>
    </div> --}}
    <form action="{{route('poststepone') }}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-header">
              <h4>Waktu Layanan</h4>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label class="form-label">Waktu Layanan yang tersedia</label>
                <p>
                    <label for="date">Tanggal :</label>
                    <input type="date" name="tgl" id="date" />
                </p>
                <p>
                    <label for="time">Jam :</label>
                    <input type="time" name="jam" id="time" />
                  </p>
                </label>
              </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Next</button>
            </div>
        </div>
    </div>
</form>
</div>
@endsection
