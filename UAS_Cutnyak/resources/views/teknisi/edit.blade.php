@extends('layouts.master')
@section('title', 'Friend Celluler || Edit Teknisi')
@section('judul', 'Teknisi')
@section('subjudul', 'Form Edit teknisi')
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
        <form method="post" action="/teknisi/{{$tek->id}}">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Teknisi</label>
                <input type="text" readonly value="{{$tek->nm_tek}}" class="form-control" name="nm_tek">
            </div>
            <div class="mb-3">
                <label class="form-label">Nomor Handphone</label>
                <input type="text" value="{{$tek->no_tek}}" class="form-control" name="no_tek">
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat Teknisi</label>
                <input type="text" value="{{$tek->alamat_tek}}" class="form-control" name="alamat_tek">
            </div>
            <button type="submit" class="btn btn-primary">Edit Data</button>
            <a href="/teknisi" class="btn btn-secondary">Kembali</a>
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