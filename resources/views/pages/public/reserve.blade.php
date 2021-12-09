@extends('layouts.public')

@section('content')
<div class="row mt-3">
    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
      <div class="login-brand">
        <img src="/assets/img/outlet/logo-brother.png" alt="logo" width="100" class="shadow-light rounded-circle">
      </div>
      {{-- BUKTI RESERVASI --}}
      <div class="card">
        <div class="card-body">
            <div class="row mt-4">

            @if (!empty($transaksi))
                <div class="col">
                    <h4>Informasi Pembayaran</h4>
                    <hr>
                    <p>Untuk pembayaran tidak dapat ditransfer.:</p>
                    <div class="media">
                        <img src="{{ asset('assets/img/cash.png') }}" alt="" width="70" class="mr-3">
                        <div class="media-body">
                            <h5>CASH ONLY</h5>
                            Note: <strong>No Cash No Haircut</strong>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <h4 class="text-center">Reservasi Anda: {{ $transaksi->kode_transaksi }}</h4>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-borderless table-md">
                                <h6>Layanan :</h6>
                                @foreach ($layanan as $data)
                                <ul class="list-group">
                                    <li class="list-group-item">{{ $data->nama_layanan }}</li>
                                </ul>
                                @endforeach

                                @foreach ($barber as $data)
                                <tr>
                                    <td class="text-right"><strong>Outlet :</strong></td>
                                    <td class="text-right"><strong>{{ $data->nama_barber }}</strong></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>Alamat :</strong></td>
                                    <td class="text-right"><strong>{{ $data->alamat }}</strong></td>
                                </tr>
                                @endforeach

                                @foreach ($user as $data)
                                <tr>
                                    <td class="text-right"><strong>Nama :</strong></td>
                                    <td class="text-right"><strong>{{ $data->name }}</strong></td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td class="text-right"><strong>Tanggal :</strong></td>
                                    <td class="text-right"><strong>{{ $transaksi->tgl_reservasi }}</strong></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>Jam :</strong></td>
                                    <td class="text-right"><strong>{{ $transaksi->jam_reservasi }}</strong></td>
                                </tr>
                                <hr>
                                <tr>
                                    <td class="text-right"><strong>Total Harga:</strong></td>
                                    <td class="text-right"><strong>@currency($transaksi->total_biaya)</strong></td>
                                </tr>

                            </table>
            @else
                            <div class="card">
                                <h5 class="card-header"><i class="fas fa-exclamation-triangle"></i>~MAAF...!!!</h5>
                                <div class="card-body">
                                  <h5 class="card-title">ANDA BELUM MELAKUKAN RESERVASI.</h5>
                                  <p class="card-text">Saatnya Ikuti Trend Rambut masa kini..!!
                                    Lakukan reservasi supaya anda tidak menunggu lama.</p>
                                  <a href="/" class="btn btn-primary">Go Reservasi</a>
                                </div>
                            </div>
                                {{-- <tr>
                                    <td class="text-right"><strong>Total Harga:</strong></td>
                                    <td class="text-right">
                                        <strong>{{ format_rp($transaksi->harga_total) }}</strong></td>
                                </tr> --}}
            @endif
                    </div>
                    <hr>
                    {{-- @if (empty($transaksi->kurir))
                        <button type="button" class="btn btn-warning btn-block">Pilih Jasa Kurir Dahulu</button>
                    @else
                        <form action="{{route('history.store')}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-success btn-block">Pesan Sekarang</button>
                        </form>
                    @endif --}}
                </div>
            </div>
        </div>
    </div>

    {{-- RIWAYAT ORDERAN --}}
    {{-- <div class="card">
        <div class="card-header">
          <h4>Full Width</h4>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-striped table-md">
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Created At</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
              <tr>
                <td>1</td>
                <td>Irwansyah Saputra</td>
                <td>2017-01-09</td>
                <td><div class="badge badge-success">Active</div></td>
                <td><a href="#" class="btn btn-secondary">Detail</a></td>
              </tr>
              <tr>
                <td>2</td>
                <td>Hasan Basri</td>
                <td>2017-01-09</td>
                <td><div class="badge badge-success">Active</div></td>
                <td><a href="#" class="btn btn-secondary">Detail</a></td>
              </tr>
              <tr>
                <td>3</td>
                <td>Kusnadi</td>
                <td>2017-01-11</td>
                <td><div class="badge badge-danger">Not Active</div></td>
                <td><a href="#" class="btn btn-secondary">Detail</a></td>
              </tr>
              <tr>
                <td>4</td>
                <td>Rizal Fakhri</td>
                <td>2017-01-11</td>
                <td><div class="badge badge-success">Active</div></td>
                <td><a href="#" class="btn btn-secondary">Detail</a></td>
              </tr>
              <tr>
                <td>5</td>
                <td>Isnap Kiswandi</td>
                <td>2017-01-17</td>
                <td><div class="badge badge-success">Active</div></td>
                <td><a href="#" class="btn btn-secondary">Detail</a></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="card-footer text-right">
          <nav class="d-inline-block">
            <ul class="pagination mb-0">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
              </li>
              <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
              <li class="page-item">
                <a class="page-link" href="#">2</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div> --}}
</div>
@endsection
