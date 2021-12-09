<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Layanan;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (!Auth::user()) {
            return redirect()->route('login');
        }

        $transaksi = Transaksi::where('id_user', Auth::user()->id)->first();
        if ($transaksi === null) {
            return view('pages.public.reserve');
        } else {

            $transaksi = Transaksi::where('id_user', Auth::user()->id)->first();

            $layanan = DB::table('detail_transaksi')
                ->join('layanan', 'layanan.id_layanan', '=', 'detail_transaksi.id_layanan')
                ->select('layanan.nama_layanan')
                ->where('detail_transaksi.id_transaksi', '=', $transaksi->id_transaksi)
                ->get();

            $user = DB::table('transaksi')
                ->join('users', 'users.id', '=', 'transaksi.id_user')
                ->select('users.name')
                ->where('transaksi.id_transaksi', '=', $transaksi->id_transaksi)
                ->get();

            $barber = DB::table('transaksi')
                ->join('barber', 'barber.id_barber', '=', 'transaksi.id_barber')
                ->select('barber.nama_barber', 'barber.alamat')
                ->where('transaksi.id_transaksi', '=', $transaksi->id_transaksi)
                ->get();

            return view('pages.public.reserve', [
                'user' => $user,
                'barber' => $barber,
                'layanan' => $layanan,
                'transaksi' => $transaksi
            ]);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaksi = Transaksi::where('id_user', Auth::user()->id)->first();
        $wesGaOnoOpoOpo = [];
        foreach ($request->service as $getLocation) {
            $wesGaOnoOpoOpo[] = [
                'id_layanan' => $getLocation,
                'id_transaksi' => $transaksi->id_transaksi
            ];
        }
        TransaksiDetail::insert($wesGaOnoOpoOpo);

        $whoAmI = DB::table('detail_transaksi')
            ->join('layanan', 'layanan.id_layanan', '=', 'detail_transaksi.id_layanan')
            ->where('detail_transaksi.id_transaksi', '=', $transaksi->id_transaksi)
            ->get();

        $durasi_total = collect($whoAmI)->sum('durasi');
        $harga_total = collect($whoAmI)->sum('harga');

        $time = Carbon::parse($transaksi->jam_reservasi);
        $endTime = $time->addMinutes($durasi_total);
        $hackMePlease = [
            'jam_selesai' => $endTime,
            'total_waktu' => $durasi_total,
            'total_biaya' => $harga_total
        ];
        DB::table('Transaksi')
            ->where('id_user', Auth::user()->id)
            ->limit(1)
            ->update($hackMePlease);

        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
