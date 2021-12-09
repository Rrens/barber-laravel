@extends('layouts.public')

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                  <h4>Pilih Layanan</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                    @php
                    $layanan = DB::table('layanan')->get();
                    @endphp

                <form action="{{ route('order.store') }}" method="post">
                    @csrf
                            <div class="row gutters-sm">
                            @foreach ($layanan as $item)
                                <div class="col-6 col-sm-4">
                                    <label class="imagecheck mb-2">
                                        <input name="service[]" type="checkbox" value="{{ $item->id_layanan }}"  class="imagecheck-input"  />
                                        <figure class="imagecheck-figure">
                                            <img src="{{asset('storage/thumbs/layanan/' . $item->thumb)}}" alt="}" class="imagecheck-image">
                                        </figure>
                                        <h6 class="mb-0">{{ $item->nama_layanan }}</h6>
                                        <p>@currency($item->harga)</p>
                                    </label>
                                </div>
                                @endforeach
                            </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success btn-sm">Pesan Sekarang</button>
                        </div>
                </form>

                  </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-6">
            {{-- OUTPUT OUTLET DAN TGL JAM PESANAN YANG DIPILIH --}}
            <div class="card">
                <div class="card-header text-center">
                  <h4>Rincian Reservasi:</h4>
                </div>
                <div class="card-body">
                    <hr>
            <div class="table-responsive">
                <table class="table table-borderless table-md">
                    {{-- @foreach($detailOutlet as $datas)

                    @endforeach --}}
                    @if (!empty($transaksi->id_barber))

                        {{-- @if (!empty($keranjang)) --}}
                            @foreach ($barber as $data)
                                <tr>
                                    <td class="text-right"><strong>Outlet:</strong></td>
                                    <td class="text-right"><strong>{{ $data->nama_barber }}</strong></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>Alamat:</strong></td>
                                    <td class="text-right"><strong>{{ $data->alamat }}</strong></td>
                                </tr>
                            @endforeach
                        {{-- @else --}}

                        <tr>
                            <td class="text-right"><strong>Tanggal:</strong></td>
                            <td class="text-right"><strong>{{ $transaksi->tgl_reservasi }}</strong></td>
                        </tr>
                        <tr>
                            <td class="text-right"><strong>Jam:</strong></td>
                            <td class="text-right"><strong>{{ $transaksi->jam_reservasi }}</strong></td>
                        </tr>
                    @else
                        {{-- <tr>
                            <td class="text-right"><strong>Total Harga:</strong></td>
                            <td class="text-right">
                                <strong>{{ format_rp($transaksi->harga_total) }}</strong></td>
                        </tr> --}}
                    @endif
                </table>
            </div>
            <hr>
                </div>
            </div>


        </div>

    </div>
@endsection
