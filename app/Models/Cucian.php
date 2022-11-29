<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cucian extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }
}
