<?php

namespace App\Http\Controllers;

use App\DataTables\PelangganDataTable;
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
    public function index(PelangganDataTable $dataTable)
    {
        // $p = Pelanggan::where('outlet_id', auth()->user()->outlet->id)->latest()->paginate(10);
        // return view('pelanggan.index', compact('p'));

        return $dataTable->render('pelanggan.index');
    }

}
