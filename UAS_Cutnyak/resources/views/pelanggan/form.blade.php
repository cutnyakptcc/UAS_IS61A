@extends('layouts.master')
@section('title', 'Friend Celluler || Tambah Pelanggan')
@section('judul', 'Tambah Pelanggan')
@section('subjudul', 'Form Tambah Pelanggan')

@section('css')
<!-- Icons -->
<link rel="shortcut icon" href="assets/media/favicons/favicon.png">
<link rel="icon" type="image/png" sizes="192x192" href="assets/media/favicons/favicon-192x192.png">
<link rel="apple-touch-icon" sizes="180x180" href="assets/media/favicons/apple-touch-icon-180x180.png">
<!-- END Icons -->

<!-- Stylesheets -->
<link rel="stylesheet" id="css-main" href="assets/css/dashmix.min.css">
<link rel="stylesheet" id="css-theme" href="assets/css/themes/xwork.min.css"> 
<!-- END Stylesheets -->
@endsection

@section('content')
<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Form Tambah Pelanggan</h3>
    </div>
    <div class="block-content block-content-full">
        <form action="/pelanggan/store/" method="POST">
            @csrf
            <div class="form-group">
                <label for="nm_p">Nama Pelanggan</label>
                <input type="text" class="form-control" id="nm_p" name="nm_p" placeholder="Masukkan Nama Pelanggan" required>
            </div>
            <div class="form-group">
                <label for="no_p">Nomor Handphone</label>
                <input type="text" class="form-control" id="no_p" name="no_p" placeholder="Masukkan Nomor Handphone" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat Pelanggan</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="4" placeholder="Masukkan Alamat Pelanggan" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/pelanggan" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection

@section('js')
<script src="assets/js/dashmix.app.min.js"></script>
<!-- jQuery (required for DataTables plugin) -->
<script src="assets/js/lib/jquery.min.js"></script>
@endsection
