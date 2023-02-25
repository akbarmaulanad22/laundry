<?php

namespace App\Http\Controllers;

use App\Models\Cucian;
use App\Models\Pelanggan;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $p = Pelanggan::where('outlet_id', '=', auth()->user()->outlet->id)
                        ->latest()
                        ->limit(3)
                        ->get();
        $c = Cucian::where('outlet_id', '=', auth()->user()->outlet->id)
                    ->where('status', '=', 'Baru')
                    ->latest()
                    ->limit(3)
                    ->get();
        
        $t = Transaksi::where('outlet_id', '=', auth()->user()->outlet->id)
                        ->latest()
                        ->limit(3)
                        ->get();
        $o = auth()->user()->outlet;
        return view('dashboard', [
            'pelanggan' => $p,
            'cucian' => $c,
            'transaksi' => $t,
            'outlet' => $o,
            'total'=> $t->where('status', '=', 'Dibayar')->sum('total_harga')
        ]);
    }
}
