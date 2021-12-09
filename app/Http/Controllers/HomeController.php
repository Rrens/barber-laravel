<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use App\Models\Layanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()) {
            $transaksi = Transaksi::where('id_user', Auth::user()->id)->first();
            if ($transaksi !== null) {
                if ($transaksi->total_biaya === 0) {
                    # hapus data dan batalkan transaksi
                    DB::table('Transaksi')
                        ->where('id_user', Auth::user()->id)
                        ->delete();
                }
            }
        }

        $barber = Barber::all();
        $layanan = DB::table('layanan')->get();
        return view('pages.public.index', ['barber' => $barber, 'layanan' => $layanan]);
    }

    public function appointment() {
        if (Auth::user()) {
            $transaksi = Transaksi::where('id_user', Auth::user()->id)->first();
            if ($transaksi !== null) {
                if ($transaksi->total_biaya === 0) {
                    # hapus data dan batalkan transaksi
                    DB::table('Transaksi')
                        ->where('id_user', Auth::user()->id)
                        ->delete();
                }
            }
        }

        $barber = Barber::all();
        return view('pages.public.appointment', ['barber' => $barber]);
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
        //
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
        $barber = Barber::find($id);
        return view('pages.public.layanan-detail', [
            'barber' => $barber
        ]);
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
