<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    public function riwayat()
    {
        return $this->belongsTo(Riwayat::class, 'riwayats_id');
    }
}
