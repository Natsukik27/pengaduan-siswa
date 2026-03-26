@extends('layouts.backend.master')

@section('title', 'Dashboard - Sistem Pengaduan Siswa')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="{{ route('laporan.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Laporan
        </a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Total Pengaduan Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Pengaduan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPengaduan }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-exclamation-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pengaduan Selesai Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Pengaduan Selesai</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $selesaiCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pengaduan Proses Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Sedang Diproses</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $prosesCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-spinner fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pengaduan Menunggu Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Menunggu Tindakan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $menungguCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clock fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Status Penyelesaian -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Status Penyelesaian Pengaduan</h6>
                </div>
                <div class="card-body">
                    <h4 class="small font-weight-bold">Menunggu <span class="float-right">{{ $menungguPercentage }}%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $menungguPercentage }}%"
                            aria-valuenow="{{ $menungguPercentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Dalam Proses <span class="float-right">{{ $prosesPercentage }}%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-info" role="progressbar" style="width: {{ $prosesPercentage }}%"
                            aria-valuenow="{{ $prosesPercentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Selesai <span class="float-right">{{ $selesaiPercentage }}%</span></h4>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ $selesaiPercentage }}%"
                            aria-valuenow="{{ $selesaiPercentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="card bg-primary text-white shadow">
                        <div class="card-body">
                            <div class="text-white-50 small">Total Siswa</div>
                            <div class="h5 font-weight-bold">{{ $totalSiswa }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-success text-white shadow">
                        <div class="card-body">
                            <div class="text-white-50 small">Pengaduan Hari Ini</div>
                            <div class="h5 font-weight-bold">{{ $pengaduanHariIni }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-info text-white shadow">
                        <div class="card-body">
                            <div class="text-white-50 small">Rata-rata Response</div>
                            <div class="h5 font-weight-bold">{{ $rataResponse }} Hari</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-warning text-white shadow">
                        <div class="card-body">
                            <div class="text-white-50 small">Tingkat Penyelesaian</div>
                            <div class="h5 font-weight-bold">{{ $tingkatPenyelesaian }}%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kategori Pengaduan & Aktivitas -->
        <div class="col-lg-6 mb-4">
            <!-- Kategori Pengaduan -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Kategori Pengaduan</h6>
                </div>
                <div class="card-body">
                    @if($kategoriStats->count() > 0)
                        <div class="list-group">
                            @foreach($kategoriStats as $kategori)
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $kategori['nama'] }}
                                <span class="badge badge-primary badge-pill">{{ $kategori['count'] }}</span>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center text-muted">
                            <i class="fas fa-tags fa-2x mb-2"></i>
                            <p>Belum ada data kategori</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Aktivitas Terbaru</h6>
                </div>
                <div class="card-body">
                    @if(count($recentActivities) > 0)
                        <div class="activity-list">
                            @foreach($recentActivities as $activity)
                            <div class="activity-item mb-3">
                                <div class="d-flex justify-content-between">
                                    <strong>{{ $activity['title'] }}</strong>
                                    <small class="text-muted">{{ $activity['time'] }}</small>
                                </div>
                                <small>{{ $activity['description'] }}</small>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center text-muted">
                            <i class="fas fa-inbox fa-2x mb-2"></i>
                            <p>Tidak ada aktivitas terbaru</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Aksi Cepat</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('siswa.index') }}" class="btn btn-primary btn-block">
                                <i class="fas fa-users mr-2"></i>Data Siswa
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('kategori.index') }}" class="btn btn-success btn-block">
                                <i class="fas fa-tags mr-2"></i>Kategori
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('inputaspirasi.index') }}" class="btn btn-info btn-block">
                                <i class="fas fa-comments mr-2"></i>Pengaduan
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('laporan.index') }}" class="btn btn-warning btn-block">
                                <i class="fas fa-chart-bar mr-2"></i>Laporan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection