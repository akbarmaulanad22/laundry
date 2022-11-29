<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function cucians()
    {
        return $this->hasMany(Cucian::class);
    }

    public function pelanggans()
    {
        return $this->hasMany(Pelanggan::class);
    }
    
    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }

}
