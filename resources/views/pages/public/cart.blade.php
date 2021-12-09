@extends('layouts.public')

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h4 class="text-center">Pilih Tanggal Jam Layanan</h4>
                <hr>
                {{-- <div class="row"> --}}
                    <div class="col-5">
                        <form action="{{ route('cart.store') }}" method="post">
                            @csrf
                                      <div class="form-group">
                                        <p>
                                            <label for="date">Select Date: </label>
                                            <input type="date" id="date" name="tgl"/>
                                        </p>
                                        <p>
                                            <label for="time">Select Time: </label>
                                            <input type="time" step="1800" min="09:00:00" max="21:00:00" id="time" name="jam"/>
                                        </p>

                                        </div>
                                        <div class="form-group">
                                            <label for="time">Select Time: </label>
                                            <input type="text" id="picker" class="form-control" name="tgl"/>
                                        </div>

                                      <p class="card-text"><strong class="text-danger">Note:</strong> <br> Reservasi hanya berlaku pada Jam <b>09:00-21:00 WIB</b> dan Pastikan panjang jam pada 00menit - 30menit</p>

                            <button type="submit" class="btn btn-primary"><i class="fas fa-arrow-circle-right"></i>
                                Next
                            </button>
                        </form>
                    </div>
                    <div class="col-7">
                        {{-- @if (!empty($result))
                            <div class="table-responsive">
                                <table class="table table-borderless table-md">
                                    <tr>
                                        <th class="text-center">Nama Jasa</th>
                                        <th class="text-center">Deskripsi</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                    @forelse ($result as $res)
                                        <form action="{{ route('jasa') }}" method="post">
                                            @csrf
                                            <tr>
                                                <td class="text-center">
                                                    {{ $nama_jasa }}
                                                    <input type="hidden" name="kurir" id="kurir"
                                                        value="{{ $nama_jasa }}">
                                                </td>
                                                <td class="text-center">
                                                    <ul>
                                                        <li>
                                                            {{ format_rp($res['biaya']) }}
                                                            <input type="hidden" name="biaya" id="biaya"
                                                                value="{{ $res['biaya'] }}">
                                                        </li>
                                                        <li>
                                                            {{ $res['deskripsi'] }} ({{ $res['servis'] }})
                                                            <input type="hidden" name="jasa" id="jasa"
                                                                value="{{ $res['servis'] }}">
                                                        </li>
                                                        <li>
                                                            Estimasi sampai (hari): {{ $res['etd'] }}
                                                            <input type="hidden" name="etd" id="etd"
                                                                value="{{ $res['etd'] }}">
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <button type="submit" class="btn btn-warning text-center">
                                                        Pilih Jasa
                                                    </button>
                                                </td>
                                            </tr>
                                        </form>
                                    @empty

                                    @endforelse
                                </table>
                            </div>
                        @else

                        @endif --}}
                    </div>
                {{-- </div> --}}
            </div>
        </div>

    </div>
@endsection
@section('script')
    <script>
        $('#picker').datetimepicker({
            timepicker: true,
            datepicker: false,
            format: 'H:i',
            value: '09:00',
            hours12: true,
            step: 5,
            allowTimes: ['09:00', '09:30', '10:30', '11:00', '11:30', '12:00', '12:30', '13:00', '13:30', '14:00', '14:30', '15:00',
                        '15:30', '16:00', '16:30', '17:00', '17:30', '18:00', '18:30', '19:00', '19:30', '20:00', '20:30', '21:00' ]
        });
    </script>
@endsection
