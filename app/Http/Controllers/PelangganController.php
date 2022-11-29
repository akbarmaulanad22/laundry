<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Produk;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $p = Pelanggan::where('outlet_id', auth()->user()->outlet->id)->latest()->paginate(10);
        return view('pelanggan.index', compact('p'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $outlet_id = $request->id;
        return view('produk.create', compact('outlet_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $outlet_id = $request->outlet_id;
        $rules = $request->validate([
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'telepon' => 'required|max:13',
            'nama_produk' => 'required',
            'harga' => 'required',
            'jenis' => 'required',
        ]);

        $pelanggan = [
            'outlet_id' => $outlet_id,
            'nama' => $rules['nama_pelanggan'],
            'alamat' => $rules['alamat'],
            'telepon' => $rules['telepon'],
        ];

        $p = Pelanggan::create($pelanggan);

        for($i = 0; $i < count($request->nama_produk); $i++){
            Produk::create([
                'outlet_id' => $outlet_id,
                'pelanggan_id' => $p->id,
                'nama_produk' => $rules['nama_produk'][$i],
                'harga' => $rules['harga'][$i],
                'jenis' => $rules['jenis'][$i],

            ]);
        }

        return to_route('outlet.show', $outlet_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggan $pelanggan)
    {
        $produks = Produk::where('pelanggan_id', $pelanggan->id)->get();
        return view('produk.update', compact('pelanggan', 'produks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        foreach ($pelanggan->produks as $produk) {
            $produk->delete();
        }

        $outlet_id = $pelanggan->outlet->id;
        $rules = $request->validate([
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'telepon' => 'required|max:13',
            'nama_produk' => 'required',
            'harga' => 'required',
            'jenis' => 'required',
        ]);

        for($i = 0; $i < count($request->nama_produk); $i++){
            Produk::create([
                'outlet_id' => $outlet_id,
                'pelanggan_id' => $pelanggan->id,
                'nama_produk' => $rules['nama_produk'][$i],
                'harga' => $rules['harga'][$i],
                'jenis' => $rules['jenis'][$i],

            ]);
        }

        return to_route('outlet.show', $outlet_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggan $pelanggan)
    {
        //
    }
}
