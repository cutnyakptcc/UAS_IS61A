<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Teknisi extends Model
{
    public function riwayats()
    {
        return $this->hasMany(Riwayat::class, 'pelanggans_id');
    } 
    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'transaksis_id');
    }
}
