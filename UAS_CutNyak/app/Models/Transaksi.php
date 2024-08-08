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
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggans_id');
    }
    public function teknisi()
    {
        return $this->belongsTo(Teknisi::class, 'teknisis_id');
    }
}
