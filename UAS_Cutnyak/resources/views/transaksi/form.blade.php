@extends('layouts.master')
@section('title', 'Friend Cellular || Form Transaksi')
@section('judul', 'Form Transaksi')
@section('subjudul', 'TambahData Transaksi')
@section('css')
<!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('assets/media/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/media/favicons/apple-touch-icon-180x180.png') }}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">

    <!-- Dashmix framework -->
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/dashmix.min.css') }}">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <link rel="stylesheet" id="css-theme" href="{{ asset('assets/css/themes/xwork.min.css') }}">
    <!-- END Stylesheets -->
@endsection

@section('content')
<!-- Formulir untuk Menambah/Edit Transaksi -->
<div class="block block-rounded">
    <div class="block-content block-content-full">
        <form action="/transaksi/store/" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="nofak" class="form-label">Nomor Faktur</label>
                <input type="text" class="form-control" id="nofak" name="nofak" >
            </div>

            <div class="mb-3">
                <label class="form-label">Riwayat Perbaikan</label>
                <select name="riwayat" class="form-control" id="">
                    <option value="">-Pilih Riwayat-</option>

                    @foreach ($rit as $item)
                        <option value="{{$item->id}}">{{$item->kd_rit}}</option>
                    @endforeach

                </select>

            </div>

            <div class="mb-3">
                <label class="form-label">Bukti Pembayaran</label>
                <input type="file" class="form-control" name="bukti_pem" accept="image/*">
            </div>

            <div class="mb-4">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('assets/js/dashmix.app.min.js') }}"></script>

    <!-- jQuery (required for DataTables plugin) -->
    <script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('assets/js/plugins/datatables/dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('assets/js/pages/be_tables_datatables.min.js') }}"></script>
@endsection
