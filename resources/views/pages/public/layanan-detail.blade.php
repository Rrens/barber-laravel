
@extends('layouts.public')

@section('content')
{{-- <div class="container">
    <div class="row"> --}}
        <div class="col-lg-5 mt-5">
            <iframe src="{{$barber->link}}" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="col">
            <h3>{{ $barber->nama_barber }}</h3>
            {{-- <p>{!! $barber->deskripsi !!}</p> --}}
            <h2 class="d-flex align-items-center mb-4"><i class="fas fa-map-marked-alt"></i></h2>
            <h5 class="d-flex align-items-center mb-4">{{ $barber->alamat }}</h5>
            {{-- <h5>Jumlah Beli</h5> --}}
            <form action="{{ route('location', ['id' => $barber->id_barber]) }}" method="POST">
                @csrf
                {{-- JUMLAH BELI --}}
                {{-- <div class="form-group">
                    <input id="jumlah" name="jumlah" type="number" class="form-control"
                        placeholder="Masukkan jumlah beli..." min="1" max="{{$barber->stock}}">
                </div> --}}

                @if (!Auth::user())
                    @if (empty(Auth::user()->role))
                        <a href="{{ route('login') }}" class="btn btn-primary">
                            <i class="fas fa-location-arrow"></i> lanjutkan pesanan
                        </a>
                    @else
                        <button type="submit" class="btn btn-primary"><i class="fas fa-location-arrow"></i> lanjutkan layanan</button>
                    @endif
                @else
                    {{-- @php
                        $transaksi = DB::table('transaksi')
                            ->where('id_user', Auth::user()->id)
                            ->where('status_transaksi', 'keranjang')
                            ->first();
                        if ($transaksi) {
                            $detail = DB::table('detail_transaksi')
                                ->join('layanan', 'layanan.id_layanan', '=', 'detail_transaksi.id_layanan')
                                ->where('detail_transaksi.id_transaksi', '=', $transaksi->id_transaksi)
                                ->get();
                        }
                    @endphp --}}
                    {{-- @if (!empty($detail))
                        @php
                            foreach ($detail as $data) {
                                if ($data->id_layanan === $barber->id_layanan) {
                                    $id_layanan = $data->id_layanan;
                                } else {
                                    $id_layanan = 0;
                                }
                            }
                        @endphp
                        @if ($id_layanan === $barber->id_layanan)
                            <a href="/cart" class="btn btn-dark">
                                <i class="fas fa-shopping-cart mr-2"></i> layanan Berada di Keranjang
                            </a>
                        @else
                            <button type="submit" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> + Layanan</button>
                        @endif
                    @else
                    @endif --}}
                    <button type="submit" class="btn btn-primary"><i class="fas fa-location-arrow"></i> Tentukan Jam Layanan</button>
                @endif

            </form>
        </div>
    {{-- </div>
</div> --}}
@endsection
