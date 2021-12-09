<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barber;
use Illuminate\Support\Facades\Validator;

class BarberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $barber = Barber::all();
        return view('pages.admin.barber', [
            'barber' => $barber
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
        return view('pages.admin.barber-create');
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
            'nama_barber' => 'required',
            'alamat' => 'max:2024|required',
            'link' => 'max:2024|required',

        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        } else {
            $barber = new barber();
            $barber->nama_barber = $request->get('nama_barber');
            $barber->alamat = $request->get('alamat');
            $barber->link = $request->get('link');
            $barber->save();
            return redirect()->route('barber.index')->with('msg', "barber Berhasil Disimpan");
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
        $barber = Barber::find($id);
        return view('pages.admin.barber-detail', ['barber' => $barber]);
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
        $barber = Barber::find($id);
        return view('pages.admin.barber-update', ['barber' => $barber]);
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
            'nama_barber' => 'required',
            'alamat' => 'max:2024|required',
            'link' => 'max:2024|required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else {
            $barber = barber::find($id);
            $barber->nama_barber = $request->get('nama_barber');
            $barber->alamat = $request->get('alamat');
            $barber->link = $request->get('link');
            $barber->save();
            return redirect()->route('barber.index')->with('msg', "barber Berhasil Diedit");
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
        $barber = Barber::find($id);
        // File::delete(public_path("/storage/thumbs/barber" . $barber->thumb));
        $barber->delete();
        return redirect()->route('barber.index')->with('msg', "barber Berhasil Dihapus");
    }
}
