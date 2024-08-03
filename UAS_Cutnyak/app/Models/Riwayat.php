<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Riwayat extends Model
{
    // Definisikan relasi ke model Pelanggan
    public function pelanggans()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggans_id');
    }

    // Definisikan relasi ke model Teknisi
    public function teknisis()
    {
        return $this->belongsTo(Teknisi::class, 'teknisis_id');
    }
}
