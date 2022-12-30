<?php

namespace App\Http\Controllers;

use App\DataTables\PelangganDataTable;
use App\Models\Pelanggan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pelanggan.index');
    }

    public function data()
    {
        $model = Pelanggan::where('outlet_id', '=', auth()->user()->outlet->id);
        return DataTables::eloquent($model)
                            ->addIndexColumn()
                            ->toJson();
    }

}
