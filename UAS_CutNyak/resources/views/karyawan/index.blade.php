@extends('layouts.master')
@section('title','Karyawan')
@section('judul','Karyawan')
@section('subjudul','Data Karyawan')
@section('nama','Friend Cellular')
@section('pages','Home')
@section('menu','Karyawan')
@section('content')
        <!-- Page Content -->
        <div class="content">
          <!-- Dynamic Table Full -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">
                Data Karyawan
              </h3>
              <div class="card-header">
                  <a href="karyawan/form" class="btn btn-primary"> <i class="fa fa-plus"></i>Tambah data </a>
              </div>
            </div>
            <div class="block-content block-content-full overflow-x-auto">
              <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
              <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>Nama Karyawan</th>
                    <th>Nomor HP</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @forelse ($kar as $item)
                    <tr>
                        <td>{{$nomor++}}</td>
                        <td>{{$item->nm_kar}}</td>
                        <td>{{$item->hp_kar}}</td>
                        <td>
                            <a href="/karyawan/edit/{{$item->id}}" class="btn btn-info btn-xs"><i class="fa fa-pen"></i></a>
                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#hapus{{$item->id}}">
                                <i class="fa fa-trash"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="hapus{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Peringatan</h1>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    Yakin ingin menghapus data Karyawan <b>{{$item->nm_kar}}</b>?
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <form action="/penjualan/{{$item->id}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-primary">Hapus</button>
                                    </form>

                                    </div>
                                </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Tidak Ada Data</td>
                    </tr>
                @endforelse
                </tbody>
              </table>
            </div>
          </div>
          <!-- END Dynamic Table Full -->
        </div>
        <!-- END Page Content -->
 @endsection
