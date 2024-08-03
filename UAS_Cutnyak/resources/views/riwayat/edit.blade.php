@extends('layouts.master')
@section('title', 'Friend Celluler || Edit Pelanggan')
@section('judul', 'Pelanggan')
@section('subjudul', 'Form Edit Pelanggan')
@section('css')
<!-- Icons -->
<link rel="shortcut icon" href="{{ asset('assets/media/favicons/favicon.png') }}">
<link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/media/favicons/favicon-192x192.png') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/media/favicons/apple-touch-icon-180x180.png') }}">
<!-- END Icons -->

<!-- Stylesheets -->
<link rel="stylesheet" id="css-main" href="{{ asset('assets/css/dashmix.min.css') }}">
<link rel="stylesheet" id="css-theme" href="{{ asset('assets/css/themes/xwork.min.css') }}">
<!-- END Stylesheets -->
@endsection

@section('content')
<div class="block block-rounded">
    <div class="block-content block-content-full">
        <form action="/riwayat/{{$rit->id }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label class="form-label">Kode Riwayat</label>
                <input type="text" readonly value="{{$rit->kd_rit}}" class="form-control" name="kd_rit">
            </div> 
            <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <input type="text" readonly value="{{$rit->nm_brg}}" class="form-control" name="nm_brg">
            </div> 
            <div class="mb-3">
                <label class="form-label">Merk</label>
                <input type="text" readonly value="{{$rit->merk_brg}}" class="form-control" name="merk_brg">
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Barang</label>
                <input type="text" readonly value="{{$rit->jenis_brg}}" class="form-control" name="jenis_brg">
            </div>
            <div class="mb-3">
                <label class="form-label">Pilih Pelanggan</label>
                <select name="pelanggan" class="form-control">
                    <option value="">-Pilih Pelanggan-</option>
                    @foreach ($pel as $item)
                        <option value="{{$item->id}}" {{ $item->id == $rit->pelanggans_id ? 'selected' : '' }}>
                            {{$item->nm_p}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Pilih Teknisi</label>
                <select name="teknisi" class="form-control">
                    <option value="">-Pilih Teknisi-</option>
                    @foreach ($tek as $item)
                        <option value="{{$item->id}}" {{ $item->id == $rit->teknisis_id ? 'selected' : '' }}>
                            {{$item->nm_tek}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Perbaikan</label>
                <input type="text" readonly value="{{$rit->tgl_per}}" class="form-control" name="tgl_per">
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Selesai Perbaikan</label>
                <input type="text" readonly value="{{$rit->tgl_sel}}" class="form-control" name="tgl_sel">
            </div> 
            <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="text" readonly value="{{$rit->harga}}" class="form-control" name="harga">
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah</label>
                <input type="text" readonly value="{{$rit->jum}}" class="form-control" name="jum">
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto">
                @if($rit->foto)
                    <img src="{{ asset('/foto/'.$rit->foto) }}" width="100" alt="">
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <input type="text" readonly value="{{$rit->ket}}" class="form-control" name="ket">
            </div>
            <button type="submit" class="btn btn-primary">Edit Data</button>
            <a href="/pelanggan" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
    
@endsection

@section('js')
<script src="{{ asset('assets/js/dashmix.app.min.js') }}"></script>
<!-- jQuery (required for DataTables plugin) -->
<script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>
@endsection