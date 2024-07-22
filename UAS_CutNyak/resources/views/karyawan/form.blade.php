@extends('layouts.master')
@section('title','Karyawan')
@section('judul','Karyawan')
@section('subjudul','Data Karyawan')
@section('nama','Friend Cellular')
@section('pages','Form')
@section('menu','Karyawan')
@section('content')
        <!-- Page Content -->
        <div class="content">
          <form class="js-validation" action="/karyawan/store" method="POST">
            @csrf
            <div class="block block-rounded">
              <div class="block-header block-header-default">
                <h3 class="block-title">Karyawan Form</h3>
              </div>
              <div class="block-content block-content-full">
                <div class="row items-push">
                  <div class="col-lg-8 col-xl-5">
                    <div class="mb-4">
                      <label class="form-label" for="nm_kar">Nama Karyawan <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="nm_kar" name="nm_kar" placeholder="masukkan nama Karyawan">
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="hp_kar">Nomor HP Karyawan <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="hp_kar" name="hp_kar" placeholder="masukkan No.HP">
                    </div>
                  </div>
                </div>
                <!-- END Regular -->

                 <!-- Submit -->
                <div class="row items-push">
                  <div class="col-lg-7 offset-lg-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
                <!-- END Submit -->
              </div>
            </div>
          </form>
          <!-- jQuery Validation -->

@endsection