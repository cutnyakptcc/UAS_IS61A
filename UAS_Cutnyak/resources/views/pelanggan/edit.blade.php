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
<div class="card">
    <div class="card-header">


    <div class="card-tools">
    <div class="card-body">
        <form method="post" action="/pelanggan/{{$pel->id}}">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Pelanggan</label>
                <input type="text" readonly value="{{$pel->nm_p}}" class="form-control" name="nm_p">
            </div>
            <div class="mb-3">
                <label class="form-label">Nomor Handphone</label>
                <input type="text" value="{{$pel->no_p}}" class="form-control" name="no_p">
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat Pelanggan</label>
                <input type="text" value="{{$pel->alamat}}" class="form-control" name="alamat">
            </div>
            <button type="submit" class="btn btn-primary">Edit Data</button>
            <a href="/pelanggan" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    <!-- /.card-body -->
    {{-- <div class="card-footer">
    Footer
    </div> --}}
    <!-- /.card-footer-->
</div>
@endsection

@section('js')
<script src="{{ asset('assets/js/dashmix.app.min.js') }}"></script>
<!-- jQuery (required for DataTables plugin) -->
<script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>
@endsection