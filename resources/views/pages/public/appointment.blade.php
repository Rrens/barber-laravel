@extends('layouts.main')
@section('container')
{{-- <h2 class="section-title">Saatnya Ikuti Trend Rambut masa kini..!!</h2> --}}
{{-- <p class="section-lead">Lakukan reservasi supaya anda tidak menunggu lama.</p> --}}

{{-- <div class="row">
    @if (!empty($layanan))
    @foreach ($layanan as $data)
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
      <article class="article">
        <div class="article-header">
          <div class="article-image" data-background="{{asset('storage/thumbs/layanan/' . $data->thumb)}}" style="background-image: url(&quot;../assets/img/news/img08.jpg&quot;);">
          </div>
          <div class="article-title">
            <h2><a href="#">{{$data->nama_layanan}}</a></h2>
          </div>
        </div>
        <div class="article-details">
          <div class="text-right">
                <button type="button" class="btn btn-success">
                  Rp <span class="badge badge-light">{{$data->harga}}</span>
                </button>

          </div>
          <hr>
          <p>{!!$data->deskripsi!!}</p>
          <div class="article-cta">
            <a href="{{ route('home.show', $data->id_layanan) }}" class="btn btn-primary">Lihat Layanan</a>
          </div>
        </div>
      </article>
    </div>
    @endforeach

    @else

    @endif

  </div> --}}

{{-- GERAI YANG ADA DI BARBER  --}}

<div class="container">
    <div class="row sortable-card">
        @foreach ($barber as $data)
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ $data->nama_barber }}</h4>
                </div>
                <div class="card-body">
                    <p>Card <code>.card-primary</code></p>
                    <div class="service-item mb-4">
                    <a class="service-link" data-bs-toggle="modal" href="#serviceModal1">
                        <a class="btn btn-primary btn-lg"
                            data-bs-toggle="modal" href="#locationModal1" style=" background-color: #eeb35b; font-family: Palatino Linotype; color: #131311; border-style: solid; border-width: thin;" href="#contact">Brother Jatisari
                        </a>
                    </a>
                </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


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

                            {{-- @if (empty(Auth::user()->role))
                            <a href="{{ route('login') }}" class="btn btn-primary">
                                <i class="fas fa-shopping-cart mr-2"></i>Pilih Outlet
                            </a>
                            @else --}}
                                <a href="{{ route('home.show', $data->id_barber) }}" class="btn btn-primary">
                                    <i class="fas fa-shopping-cart mr-2"></i>Pilih Outlet
                                </a>
                                {{-- <a href="{{ route('home.show', $data->id_layanan) }}" class="btn btn-primary">Lihat Layanan</a> --}}
                            {{-- @endif --}}




                {{-- </form> --}}

            </div>
          </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
