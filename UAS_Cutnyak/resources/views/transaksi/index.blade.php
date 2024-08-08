@extends('layouts.master')
@section('title', 'Friend Cellular || Transaksi')
@section('judul', 'Transaksi')
@section('subjudul', 'Data Transaksi')
@section('css')
<!-- Ikon -->
<link rel="shortcut icon" href="assets/media/favicons/favicon.png">
<link rel="icon" type="image/png" sizes="192x192" href="assets/media/favicons/favicon-192x192.png">
<link rel="apple-touch-icon" sizes="180x180" href="assets/media/favicons/apple-touch-icon-180x180.png">
<!-- Akhir Ikon -->

<!-- Stylesheets -->
<!-- CSS Plugin Halaman JS -->
<link rel="stylesheet" href="assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css">
<link rel="stylesheet" href="assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css">

<!-- Framework Dashmix -->
<link rel="stylesheet" id="css-main" href="assets/css/dashmix.min.css">

<!-- Tema warna -->
<link rel="stylesheet" id="css-theme" href="assets/css/themes/xwork.min.css">
<!-- Akhir Stylesheets -->
@endsection

@section('content')
<!-- Tabel Dinamis dengan Tombol Ekspor -->
<div class="block block-rounded">
    <div class="block-content block-content-full overflow-x-auto">
        <!-- DataTables diinisialisasi pada tabel dengan menambahkan kelas .js-dataTable-buttons -->
        <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Nofak</th>
                    <th>Kode Riwayat Perbaikan</th>
                    <th>Bukti Pembayaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tra as $item)
                <tr>
                    <td>{{ $nomor++ }}</td>
                    <td>{{ $item->nofak }}</td>
                    <td>{{ $item->riwayat->kd_rit ?? 'N/A' }}</td>
                    <td>
                        <img src="{{ asset('bukti_pembayaran/' . $item->bukti_pem) }}" width="100" alt="Bukti Pembayaran">
                    </td>
                    <td>
                        <button type="button" class="btn btn-success btn-xs" data-bs-toggle="modal" data-bs-target="#detail{{ $item->id }}">
                            <i class="fa fa-eye"></i>
                        </button>

                        <!-- Modal Detail -->
                        <div class="modal fade" id="detail{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail {{ $item->nofak }}</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>Kode Riwayat</td>
                                                    <th scope="row">{{ $item->riwayat->kd_rit ?? 'N/A' }}</th>
                                                </tr>
                                                <!-- Tambahkan field lain sesuai kebutuhan -->
                                                <tr>
                                                    <td>Bukti Pembayaran</td>
                                                    <th scope="row">
                                                        <img src="{{ asset('bukti_pembayaran/' . $item->bukti_pem) }}" width="100" alt="Bukti Pembayaran">
                                                    </th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="/transaksi/edit/{{ $item->id }}" class="btn btn-info btn-xs"><i class="fa fa-pencil-alt"></i> Edit</a>
                                        <button type="button" class="btn btn-danger btn-xs" data-bs-toggle="modal" data-bs-target="#hapus{{ $item->id }}">
                                            <i class="fa fa-trash"></i> Hapus
                                        </button>

                                        <!-- Modal Hapus -->
                                        <div class="modal fade" id="hapus{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Peringatan</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Yakin ingin menghapus data Transaksi <b>{{ $item->nofak }}</b>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <form action="/transaksi/{{ $item->id }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-primary">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">Tidak Ada Data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <a href="/transaksi/form/" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
    </div>
</div>
<!-- AKHIR Tabel Dinamis dengan Tombol Ekspor -->
@endsection

@section('js')
<script src="assets/js/dashmix.app.min.js"></script>

<!-- jQuery (diperlukan untuk plugin DataTables) -->
<script src="assets/js/lib/jquery.min.js"></script>

<!-- Bootstrap JS -->
<script src="assets/js/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JS Halaman -->
<script src="assets/js/plugins/datatables/dataTables.min.js"></script>
<script src="assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="assets/js/plugins/datatables-buttons/dataTables.buttons.min.js"></script>
<script src="assets/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
<script src="assets/js/plugins/datatables-buttons-jszip/jszip.min.js"></script>
<script src="assets/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js"></script>
<script src="assets/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js"></script>
<script src="assets/js/plugins/datatables-buttons/buttons.print.min.js"></script>
<script src="assets/js/plugins/datatables-buttons/buttons.html5.min.js"></script>

<!-- Kode JS Halaman -->
<script src="assets/js/pages/be_tables_datatables.min.js"></script>
@endsection
