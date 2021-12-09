@extends('layouts.public')

@section('content')
<div class="row">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
                  <div class="card-header">
                    <h4>Layanan</h4>
                  </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Layanan yang tersedia</label>

                        <div class="row gutters-sm">
                            <div class="col-6 col-sm-4">

                                <label class="imagecheck mb-4">
                                    <input name="imagecheck" type="checkbox" value="1" class="imagecheck-input"  />
                                    <figure class="imagecheck-figure">
                                        <img src="{{asset('storage/thumbs/layanan/' . $data->thumb)}}" alt="}" class="imagecheck-image">
                                    </figure>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
        </div>
    </div>
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
                    <input type="date" id="date" />
                </p>
                <p>
                    <label for="time">Jam :</label>
                    <input type="time" id="time" />
                    {{-- <input class="form-control" type="time" value="{{ $workingtime->to->format('H:i') }}" name="to"> --}}
                  </p>
                </label>
              </div>
            </div>

        </div>
    </div>
</div>
@endsection
