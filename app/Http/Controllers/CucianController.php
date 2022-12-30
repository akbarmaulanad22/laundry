<?php

namespace App\Http\Controllers;

use App\Models\Cucian;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CucianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cucian.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->hasRole(['Admin', 'Kasir'])){
            abort(403, 'USER DOES NOT HAVE THE RIGHT ROLES.');
        }
        
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
        if(!auth()->user()->hasRole(['Admin', 'Kasir'])){
            abort(403, 'USER DOES NOT HAVE THE RIGHT ROLES.');
        }
        
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
        if(!auth()->user()->hasRole(['Admin', 'Kasir'])){
            abort(403, 'USER DOES NOT HAVE THE RIGHT ROLES.');
        }
        
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
        if(!auth()->user()->hasRole(['Admin', 'Kasir'])){
            abort(403, 'USER DOES NOT HAVE THE RIGHT ROLES.');
        }
        
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

        if(!auth()->user()->hasRole('Admin')){
            abort(403, 'USER DOES NOT HAVE THE RIGHT ROLES.');
        }
        
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

    public function data()
    {
        $model = Cucian::where('outlet_id', '=', auth()->user()->outlet->id);
        return DataTables::eloquent($model)
                            ->addIndexColumn()
                            ->addColumn('action', function($model){
                                return view('cucian.button', compact('model'));
                            })
                            ->rawColumns(['action'])
                            ->toJson();
    }
}
