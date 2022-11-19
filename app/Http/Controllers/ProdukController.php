<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $p = Produk::paginate(10);
        // return view('produk.index', compact('p'));
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
            'nama' => $rules['nama_pelanggan'],
            'alamat' => $rules['alamat'],
            'telepon' => $rules['telepon'],
        ];

        $p = Pelanggan::create($pelanggan);

        $produk = [
            'outlet_id' => $outlet_id,
            'pelanggan_id' => $p->id,
            'nama_produk' => $rules['nama_produk'],
            'harga' => $rules['harga'],
            'jenis' => $rules['jenis'],
        ];

        Produk::create($produk);
        return to_route('outlet.show', $outlet_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        return view('produk.update', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {

        $rules = $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required',
            'jenis' => 'required',
        ]);

        $data = [
            'outlet_id' => $produk->outlet->id,
            'nama_produk' => $rules['nama_produk'],
            'harga' => $rules['harga'],
            'jenis' => $rules['jenis'],
        ];

        $produk->update($data);
        return to_route('outlet.show', $produk->outlet->id);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();
        return back();
    }

}
