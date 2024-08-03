@extends('layouts.master')
@section('title','Friend Cellular || Riwayat service')
@section('judul','Riwayat')
@section('subjudul','Data Penservice')
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

<!-- Anda dapat menyertakan file tertentu dari folder css/themes/ untuk mengubah tema warna default dari template. -->
<link rel="stylesheet" id="css-theme" href="assets/css/themes/xwork.min.css">
<!-- Akhir Stylesheets -->
@endsection

@section('content')
<!-- Tabel Dinamis dengan Tombol Ekspor -->
<div class="block block-rounded">
    <div class="block-content block-content-full overflow-x-auto">
        <!-- DataTables diinisialisasi pada tabel dengan menambahkan kelas .js-dataTable-buttons, fungsionalitas diinisialisasi di js/pages/be_tables_datatables.min.js yang dikompilasi otomatis dari _js/pages/be_tables_datatables.js -->
        <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Nama Barang</th>
                    <th>Merk</th>
                    <th>Nama Pelanggan</th>
                    <th>Nama Teknisi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rit as $item)
                <tr>
                    <td>{{$nomor++}}</td>
                    <td>{{$item->nm_brg}}</td>
                    <td>{{$item->merk_brg}}</td>
                    <td>{{$item->pelanggans->nm_p}}</td>
                    <td>{{$item->teknisis->nm_tek}}</td>
                    <td>
                        <button type="button" class="btn btn-success btn-xs" data-bs-toggle="modal" data-bs-target="#detail{{$item->id}}">
                            <i class="fa fa-eye"></i>
                        </button>

                        <!-- Modal Detail -->
                        <div class="modal fade" id="detail{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail {{$item->kd_rit}}</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>Kode Riwayat</td>
                                                    <th scope="row">{{$item->kd_rit}}</th>
                                                </tr>
                                                <tr>
                                                    <td>Nama Barang</td>
                                                    <th scope="row">{{$item->nm_brg}}</th>
                                                </tr>
                                                <tr>
                                                    <td>Merk</td>
                                                    <th scope="row">{{$item->merk_brg}}</th>
                                                </tr>
                                                <tr>
                                                    <td>Jenis Barang</td>
                                                    <th scope="row">{{$item->jenis_brg}}</th>
                                                </tr>
                                                <tr>
                                                    <td>Nama Pelanggan</td>
                                                    <th scope="row">{{$item->pelanggans->nm_p}}</th>
                                                </tr>
                                                <tr>
                                                    <td>Nama Teknisi</td>
                                                    <th scope="row">{{$item->teknisis->nm_tek}}</th>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal Perbaikan</td>
                                                    <th scope="row">{{$item->tgl_per}}</th>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal Selesai Perbaikan</td>
                                                    <th scope="row">{{$item->tgl_sel}}</th>
                                                </tr>
                                                <tr>
                                                    <td>Harga</td>
                                                    <th scope="row">{{$item->harga}}</th>
                                                </tr>
                                                <tr>
                                                    <td>Jumlah Barang</td>
                                                    <th scope="row">{{$item->jum}}</th>
                                                </tr>
                                                <tr>
                                                    <td>Foto</td>
                                                    <th scope="row"><img src="{{ asset('/foto/'.$item->foto) }}" width="100" alt=""></th>
                                                </tr>
                                                <tr>
                                                    <td>Keterangan</td>
                                                    <th scope="row">{{$item->ket}}</th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <a href="/riwayat/edit/{{$item->id}}" class="btn btn-info btn-xs"><i class="fa fa-pencil-alt"></i></a>

                                    <button type="button" class="btn btn-danger btn-xs" data-bs-toggle="modal" data-bs-target="#hapus{{$item->id}}">
                                        <i class="fa fa-trash"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="hapus{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Peringatan</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Yakin ingin menghapus data Riwayat <b>{{$item->kd_rit}}</b>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <form action="/riwayat/{{$item->id}}" method="post">
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
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">Tidak Ada Data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <a href="/riwayat/form/" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
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
