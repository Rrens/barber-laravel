<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barber;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::where('id_user', Auth::user()->id)->first();
        if ($transaksi) {
            $keranjang = DB::table('detail_transaksi')
                ->join('layanan', 'layanan.id_layanan', '=', 'detail_transaksi.id_layanan')
                ->where('detail_transaksi.id_transaksi', '=', $transaksi->id_transaksi)
                ->get();
            return view('pages.public.cart', [
                'keranjang' => $keranjang,
                'transaksi' => $transaksi
            ]);
        }
        return view('pages.public.cart');
    }


    public function location($id)
    {
        if (!Auth::user()) {
            if (Auth::user()->role != 'customer') {
                return redirect()->route('home.index');
            }
            return redirect()->route('login');
        }
        $transaksi = Transaksi::where('id_user', Auth::user()->id)->first();
        $location = Barber::find($id);
        // jika tidak ada transaksi
        if (!empty($transaksi)) {
            $filterDate = Carbon::now()->isoFormat('YYYY-MM-DD');

            if ($filterDate >= $transaksi->tgl_reservasi) {
                $transaksi = new Transaksi();
                $transaksi->id_user = Auth::user()->id;
                $transaksi->id_barber = $location->id_barber;
                $transaksi->tgl_reservasi = Carbon::now()->toDateTimeString();
                $transaksi->jam_reservasi = Carbon::now()->toTimeString();
                $transaksi->jam_selesai = Carbon::now()->toTimeString();
                $transaksi->total_waktu = 0;
                $transaksi->total_biaya = 0;
                $transaksi->save();
                return redirect()->route('cart.index');
            }
            return redirect()->route('order.index');
        }

        $transaksi = new Transaksi();
        $transaksi->id_user = Auth::user()->id;
        $transaksi->id_barber = $location->id_barber;
        $transaksi->tgl_reservasi = Carbon::now()->toDateTimeString();
        $transaksi->jam_reservasi = Carbon::now()->toTimeString();
        $transaksi->jam_selesai = Carbon::now()->toTimeString();
        $transaksi->total_waktu = 0;
        $transaksi->total_biaya = 0;
        $transaksi->save();
        return redirect()->route('cart.index');
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


        $validator = Validator::make(request()->all(), [
            'tgl' => 'required',
            'jam' => 'required',

        ]);

        // $filterDate = Carbon::now()->addDays(1);
        // $from = '09:00:00';
        // $to = '21:00:00';
        // $hallo = Transaksi::where('tgl_reservasi', '=', $request->get('tgl'))
        //     ->whereBetween('jam_selesai', [$from, $to])->get();

        // // dd($hallo);
        // if ($request->get('jam') != $hallo) { //FILTER TANGGAL ORDER INPUTAN CUSTOMER HARUS LEBIH DARI 1 hari.

        //     echo "OK";
        // } else {
        //     echo "Tidak OK";
        //     // harus input tgl yang lebih dari 24jam dari hari ini.
        // }

        // // selama inputan tgl == tgl reservasi dan jam yang dipilih user !=
        // if ($request->get('tgl') >= $filterDate->toDateString()) { //FILTER TANGGAL ORDER INPUTAN CUSTOMER HARUS LEBIH DARI 1 hari.

        //     echo "boleh order, lanjutkan pengecekan jam";
        // } else {
        //     echo "gak boleh order, masukan tgl yang cocok";
        //     // harus input tgl yang lebih dari 24jam dari hari ini.
        // }

        // REDIRECT KE /CART
        // JIKA TIDAK ADA ORDERAN YANG SAMA
        // REDIRECT KE /CECKOUT DAN MEMILIH PESANAN.


        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else {

            $updateDetails = [
                'tgl_reservasi' => $request->get('tgl'),
                'jam_reservasi' => $request->get('jam')
            ];

            DB::table('Transaksi')
                ->where('id_user', Auth::user()->id)
                ->limit(1)
                ->update($updateDetails);

            $transaksi = Transaksi::where('id_user', Auth::user()->id)->first();

            $barber = DB::table('transaksi')
                ->join('barber', 'barber.id_barber', '=', 'transaksi.id_barber')
                ->select('barber.nama_barber', 'barber.alamat')
                ->where('transaksi.id_transaksi', '=', $transaksi->id_transaksi)
                ->get();


            return view('pages.public.checkout', [
                'transaksi' => $transaksi,
                'barber' => $barber
            ]);
        }
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
