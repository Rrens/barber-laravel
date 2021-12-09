<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Layanan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $layanan = Layanan::all();
        return view('pages.admin.layanan', [
            'layanan' => $layanan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.admin.layanan-create');
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
        $validator = Validator::make(request()->all(), [
            'nama_layanan' => 'required',
            'durasi' => 'required',
            'harga' => 'required',
            'thumb' => 'image|mimes:jpeg,png,jpg,svg|max:2024|required',
            'deskripsi' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        } else {
            $layanan = new Layanan();
            $layanan->nama_layanan = $request->get('nama_layanan');
            $layanan->durasi = $request->get('durasi');
            $layanan->harga = $request->get('harga');
            if ($request->hasFile('thumb')) {
                $img = $request->file('thumb');
                $filename = time() . '.' . $img->getClientOriginalExtension();
                Storage::putFileAs("public/thumbs/layanan", $img, $filename);
            }
            $layanan->thumb = $filename;
            $layanan->deskripsi = $request->get('deskripsi');
            $layanan->save();
            return redirect()->route('layanan.index')->with('msg', "layanan Berhasil Disimpan");
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
        $layanan = Layanan::find($id);
        return view('pages.admin.layanan-detail', ['layanan' => $layanan]);
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
        $layanan = Layanan::find($id);
        return view('pages.admin.layanan-update', ['layanan' => $layanan]);
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
        $validator = Validator::make(request()->all(), [
            'nama_layanan' => 'required',
            'durasi' => 'required',
            'harga' => 'required',
            'thumb' => 'image|mimes:jpeg,png,jpg,svg|max:2024|required',
            'deskripsi' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else {
            $layanan = Layanan::find($id);
            $layanan->nama_layanan = $request->get('nama_layanan');
            $layanan->durasi = $request->get('durasi');
            $layanan->harga = $request->get('harga');
            if ($request->hasFile('thumb')) {
                $img = $request->file('thumb');
                File::delete(public_path("/storage/thumbs/layanan" . $layanan->thumb));
                $filename = time() . '.' . $img->getClientOriginalExtension();
                Storage::putFileAs("public/thumbs/layanan", $img, $filename);
            }
            $layanan->thumb = $filename;
            $layanan->deskripsi = $request->get('deskripsi');
            $layanan->save();
            return redirect()->route('layanan.index')->with('msg', "layanan Berhasil Diedit");
        }
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
        $layanan = Layanan::find($id);
        File::delete(public_path("/storage/thumbs/layanan" . $layanan->thumb));
        $layanan->delete();
        return redirect()->route('layanan.index')->with('msg', "layanan Berhasil Dihapus");
    }
}
