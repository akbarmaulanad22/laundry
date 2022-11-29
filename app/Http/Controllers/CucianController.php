<?php

namespace App\Http\Controllers;

use App\Models\Cucian;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class CucianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $c = Cucian::where('outlet_id', auth()->user()->outlet->id)->latest()->paginate(10);

        return view('cucian.index', compact('c'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cucian.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $request->validate([
            'nama_pelanggan' => 'required',
            'telepon' => 'required:max:13',
            'alamat' => 'required',
            'nama_cucian' => 'required',
            'jenis' => 'required',
            'harga' => 'required',
        ]);


        $p = Pelanggan::create([
            'outlet_id' => auth()->user()->outlet->id,
            'nama' => $request->nama_pelanggan,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
        ]);

        $t = Transaksi::create([
            'user_id' => auth()->user()->id,
            'outlet_id' => auth()->user()->outlet->id,
            'pelanggan_id' => $p->id,
            'kode_transaksi' => '12345678'
        ]);

        for($i = 0; $i < count($request->nama_cucian); $i++)
        {
            Cucian::create([
                'transaksi_id' => $t->id,
                'outlet_id' => auth()->user()->outlet->id,
                'pelanggan_id' => $p->id,
                'nama' => $rules['nama_cucian'][$i],
                'harga' => $rules['harga'][$i],
                'jenis' => $rules['jenis'][$i],

            ]);
        }

        return to_route('cucian.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cucian  $cucian
     * @return \Illuminate\Http\Response
     */
    public function show(Cucian $cucian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cucian  $cucian
     * @return \Illuminate\Http\Response
     */
    public function edit(Cucian $cucian)
    {
        if ($cucian->status == 'Diambil') {
            abort(404);
        }
        return view('cucian.edit', compact('cucian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cucian  $cucian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cucian $cucian)
    {
        $request->validate([
            'nama_cucian' => 'required',
            'jenis' => 'required',
            'harga' => 'required',
        ]);
        
        $cucian->update([
            'nama' => $request->nama_cucian,
            'harga' => $request->harga,
            'jenis' => $request->jenis,

        ]);

        return to_route('cucian.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cucian  $cucian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cucian $cucian)
    {
        //
    }

    public function status(Cucian $cucian)
    {
        $status  = '';
        if ($cucian->status == 'Baru')
        {
            $status  = 'Sedang dicuci';
        } elseif ($cucian->status == 'Sedang dicuci')
        {
            $status  = 'Selesai';
        } elseif ($cucian->status == 'Selesai')
        {
            $status  = 'Diambil';
        }

        $cucian->update([
            'status' => $status
        ]);

        return back();
    }
}
