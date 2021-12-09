@extends('layouts.public')

@section('content')
    <div class="row">
        <div class="col">
            @if (session('msg'))
                <div class="alert alert-primary alert-dismissible fade show mt-2" role="alert">
                    {{ session('msg') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('layanan.create') }}" class="btn btn-primary mb-4"><i class="fas fa-plus-circle"></i>
                        Layanan Baru</a>
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tbody>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Layanan</th>
                                    <th>durasi</th>
                                    <th>harga</th>
                                    <th>Tentang Layanan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                                @if (!empty($layanan))
                                    @foreach ($layanan as $data)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $data->nama_layanan }}
                                            </td>
                                            <td>
                                                {{ $data->durasi }}
                                            </td>
                                            <td>
                                                {{ $data->harga }}
                                            </td>
                                            <td>
                                                {{ $data->deskripsi }}
                                            </td>
                                            {{-- @php
                                                $detail = DB::table('detail_transaksi')
                                                    ->where('id_layanan', $data->id_layanan)
                                                    ->first();
                                            @endphp --}}
                                            <td class="d-flex justify-content-center">
                                                <form action="{{ route('layanan.destroy', $data->id_layanan) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('layanan.show', $data->id_layanan) }}"
                                                        class="btn btn-sm btn-info">Detail</a>
                                                    <a href="{{ route('layanan.edit', $data->id_layanan) }}"
                                                        class="btn btn-sm btn-success ml-2">Edit</a>
                                                    @if (empty($detail))
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger ml-2">Hapus</button>
                                                    @else
                                                    @endif
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else

                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
