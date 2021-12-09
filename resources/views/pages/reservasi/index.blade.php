@extends('layouts.public')

@section('content')
<h2 class="section-title">Pilih Outlet Terdekat..!!</h2>
<p class="section-lead">Lakukan reservasi supaya anda tidak menunggu lama.</p>

{{-- WES GAONO OPO-OPO  --}}
<div class="row">
<div class="row row-cols-1 row-cols-md-2">
    @foreach ($barber as $data)
    <div class="col mb-4">
        <div class="card">
          <iframe src="{{$data->link}}" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          <div class="card-body">
            <h5 class="card-title">{{$data->nama_barber}}</h5>
            <p class="card-text">{{$data->alamat}}</p>
            <div class="article-cta">
                {{-- <form action="{{ route('transaksi', ['id' => $data->id_barber]) }}" method="POST"> --}}

                    {{-- @csrf --}}
                    {{-- jika pengguna belum login maka diarahkan untuk login --}}

                            @if (empty(Auth::user()->role))
                            <a href="{{ route('login') }}" class="btn btn-primary">
                                <i class="fas fa-shopping-cart mr-2"></i>Pilih Outlet
                            </a>
                            @else
                                <a href="{{ route('transaksi.barber', $data->id_barber) }}" class="btn btn-primary">
                                    <i class="fas fa-shopping-cart mr-2"></i>Pilih Outlet
                                </a>
                                {{-- <a href="{{ route('home.show', $data->id_layanan) }}" class="btn btn-primary">Lihat Layanan</a> --}}
                            @endif




                {{-- </form> --}}

            </div>
          </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
