@extends('layouts.master')
@section('title','Friend Cellular || Form Riwayat service')
@section('judul','Form Riwayat')
@section('subjudul','Form Data Penservice')
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
    <div class="card">
        <div class="card-header">
        <div class="card-tools">
        <div class="card-body">
            <form method="post" action="/riwayat/store/" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Kode Riwayat</label>
                    <input type="text" class="form-control" name="kd_rit">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" name="nm_brg">
                </div>
                <div class="mb-3">
                    <label class="form-label">Merk</label>
                    <input type="text" class="form-control" name="merk_brg">
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Barang</label>
                    <input type="text" class="form-control" name="jenis_brg">
                </div>
                <div class="mb-3">
                    <label class="form-label">Pilih Pelanggan</label>
                    <select name="pelanggan" class="form-control" id="">
                        <option value="">-Pilih Pelanggan-</option>

                        @foreach ($pel as $item)
                            <option value="{{$item->id}}">{{$item->nm_p}}</option>
                        @endforeach

                    </select>

                </div>
                <div class="mb-3">
                    <label class="form-label">Pilih Teknisi</label>
                    <select name="teknisi" class="form-control" id="">
                        <option value="">-Pilih Teknisi-</option>

                        @foreach ($tek as $item)
                            <option value="{{$item->id}}">{{$item->nm_tek}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Perbaikan</label>
                    <input type="date" class="form-control" name="tgl_per">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Selesai Perbaikan</label>
                    <input type="date" class="form-control" name="tgl_sel">
                </div>
                <div class="mb-3">
                    <label class="form-label">harga</label>
                    <input type="text" class="form-control" name="harga">
                </div>
                <div class="mb-3">
                    <label class="form-label">Jumlah</label>
                    <input type="text" class="form-control" name="jum">
                </div>
                <div class="mb-3">
                    <label class="form-label">Foto</label>
                    <input type="file" class="form-control" name="foto" accept="image/*">
                </div>
                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea class="form-control" id="ket" name="ket" rows="5"  required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
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
