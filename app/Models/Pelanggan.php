<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function cucians()
    {
        return $this->hasMany(Cucian::class);
    }

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }
}

