<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('riwayats', function (Blueprint $table) {
            $table->id();
            $table->string('kd_rit');
            $table->string('nm_brg');
            $table->string('merk_brg');
            $table->string('jenis_brg');
            $table->string('pelanggans_id');
            $table->string('teknisis_id');
            $table->date('tgl_per');
            $table->date('tgl_sel');
            $table->string('harga');
            $table->string('jum');
            $table->string('foto');
            $table->text('ket');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayats');
    }
};
