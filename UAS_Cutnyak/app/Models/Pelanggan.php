<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
   // Definisikan relasi ke model Riwayat
   public function riwayats()
   {
       return $this->hasMany(Riwayat::class, 'teknisis_id');
   }
   public function transaksis()
   {
       return $this->hasMany(Transaksi::class, 'transaksis_id');
   }
}
