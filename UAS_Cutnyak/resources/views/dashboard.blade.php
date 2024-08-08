@extends('layouts.master')
@section('title', 'Dashboard')
@section('judul', 'Dashboard')
@section('subjudul', 'Data Keseluruhan')

@section('css')
<!-- CSS khusus untuk halaman dashboard -->
<link rel="stylesheet" href="assets/css/custom_dashboard.css">
@endsection

@section('content')
<div class="row">
    <!-- Statistik Utama -->
    <div class="col-12 col-md-6 col-lg-3 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Transaksi</h5>
                <h3 class="card-text">{{ $totalTransaksi }}</h3>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-3 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Pelanggan</h5>
                <h3 class="card-text">{{ $totalPelanggan }}</h3>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-3 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Teknisi</h5>
                <h3 class="card-text">{{ $totalTeknisi }}</h3>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-3 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Pendapatan</h5>
                <h3 class="card-text">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</h3>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Grafik dan Diagram -->
    <div class="col-12 col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                Grafik Transaksi per Bulan
            </div>
            <div class="card-body">
                <canvas id="transaksiChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                Grafik Pendapatan per Kategori
            </div>
            <div class="card-body">
                <canvas id="pendapatanChart"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Tabel Ringkasan -->
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-header">
                Transaksi Terbaru
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No Faktur</th>
                            <th>Pelanggan</th>
                            <th>Tanggal</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentTransaksi as $index => $transaksi)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $transaksi->nofak }}</td>
                            <td>{{ $transaksi->pelanggan->nama }}</td>
                            <td>{{ $transaksi->created_at->format('d-m-Y') }}</td>
                            <td>Rp {{ number_format($transaksi->jumlah, 0, ',', '.') }}</td>
                            <td>
                                <a href="/transaksi/{{ $transaksi->id }}" class="btn btn-sm btn-info">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Data untuk Grafik Transaksi
    var ctxTransaksi = document.getElementById('transaksiChart').getContext('2d');
    var transaksiChart = new Chart(ctxTransaksi, {
        type: 'line',
        data: {
            labels: {!! json_encode($transaksiLabels) !!},
            datasets: [{
                label: 'Jumlah Transaksi',
                data: {!! json_encode($transaksiData) !!},
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
                fill: false
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Data untuk Grafik Pendapatan
    var ctxPendapatan = document.getElementById('pendapatanChart').getContext('2d');
    var pendapatanChart = new Chart(ctxPendapatan, {
        type: 'bar',
        data: {
            labels: {!! json_encode($pendapatanLabels) !!},
            datasets: [{
                label: 'Pendapatan',
                data: {!! json_encode($pendapatanData) !!},
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
