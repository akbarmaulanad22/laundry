<?php

namespace App\Http\Controllers;

use App\DataTables\TransaksiDataTable;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transaksi.index');
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
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        return view('transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        if(!auth()->user()->hasRole(['Admin'])){
            abort(403, 'USER DOES NOT HAVE THE RIGHT ROLES.');
        }

        $transaksi->update([
            'status' => 'Dibayar',
            'tanggal_pembayaran' => Carbon::now()
        ]);

        if ($transaksi->tanggal_pembayaran > $transaksi->batas_waktu) {
            $transaksi->update([
                'pajak' => 3000
            ]);
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }

    public function data(Request $request)
    {
        $model = Transaksi::with(['cucians', 'pelanggan'])
                        ->where('outlet_id', '=', auth()->user()->outlet->id);

        if ($request->get('from') != null) {
            $model->whereDate('created_at', '>=', $request->get('from'));
        }
        if ($request->get('to') != null) {
            if ($request->get('to') < $request->get('from')) {
                $model->whereDate('created_at', '<=', $request->get('from'));
            }else {
                $model->whereDate('created_at', '<=', $request->get('to'));
            }
        }

        if ($request->get('status')) {
            $model->where('status', '=', $request->get('status'));
        }
        

        return DataTables::eloquent($model)
                            ->addIndexColumn()
                            ->addColumn('pelanggan', function (Transaksi $transaksi) {
                                return $transaksi->pelanggan->nama;
                            })
                            ->addColumn('cucians', function (Transaksi $transaksi) {
                                return $transaksi->cucians->map(function($cucian) {
                                    return $cucian->nama;
                                })->implode('<br>');
                            })
                            ->addColumn('total', function (Transaksi $transaksi) {
                                return intval($transaksi->cucians->sum('harga') - ($transaksi->cucians->sum('harga') * $transaksi->diskon) - $transaksi->pajak);
                            })
                            ->addColumn('action', function($model){
                                return view('transaksi.button', compact('model'));
                            })
                            ->editColumn('created_at',  function (Transaksi $transaksi){
                                return $transaksi->created_at->format('j F Y');;
                            })
                            ->rawColumns(['cucians', 'action'])
                            ->toJson();
    }
}
