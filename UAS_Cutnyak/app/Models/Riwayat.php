<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;

    // Jika nama tabel tidak sesuai dengan konvensi Laravel
    // protected $table = 'riwayats';

    // Definisikan relasi ke model Pelanggan
    public function pelanggans()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggans_id');
    }

    // Definisikan relasi ke model Transaksi
    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'riwayats_id'); 
    }

    // Definisikan relasi ke model Teknisi
    public function teknisis()
    {
        return $this->belongsTo(Teknisi::class, 'teknisis_id');
    }
}
