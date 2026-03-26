@extends('layouts.backend.master')

@section('title', 'Detail Siswa - Sistem Pengaduan Siswa')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Siswa</h1>
        <a href="{{ route('siswa.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50 mr-2"></i>Kembali
        </a>
    </div>

    <!-- Content Row -->
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Siswa</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold text-primary">NIS</label>
                                <p class="form-control-plaintext border-bottom pb-2">{{ $siswa->nis }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold text-primary">Kelas</label>
                                <p class="form-control-plaintext border-bottom pb-2">
                                    @if(str_contains($siswa->kelas, 'PPLG'))
                                        <span class="badge badge-primary">{{ $siswa->kelas }}</span>
                                    @elseif(str_contains($siswa->kelas, 'AKL'))
                                        <span class="badge badge-success">{{ $siswa->kelas }}</span>
                                    @elseif(str_contains($siswa->kelas, 'MPLB'))
                                        <span class="badge badge-info">{{ $siswa->kelas }}</span>
                                    @else
                                        <span class="badge badge-secondary">{{ $siswa->kelas }}</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold text-primary">Jurusan</label>
                                <p class="form-control-plaintext border-bottom pb-2">
                                    @if(str_contains($siswa->kelas, 'PPLG'))
                                        <span class="text-primary">Pengembangan Perangkat Lunak & Gim</span>
                                    @elseif(str_contains($siswa->kelas, 'AKL'))
                                        <span class="text-success">Akuntansi & Keuangan Lembaga</span>
                                    @elseif(str_contains($siswa->kelas, 'MPLB'))
                                        <span class="text-info">Manajemen Perkantoran & Layanan Bisnis</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold text-primary">Status</label>
                                <p class="form-control-plaintext border-bottom pb-2">
                                    <span class="badge badge-success">Aktif</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold text-primary">Dibuat Pada</label>
                                <p class="form-control-plaintext border-bottom pb-2">{{ $siswa->created_at->format('d F Y H:i') }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold text-primary">Diperbarui Pada</label>
                                <p class="form-control-plaintext border-bottom pb-2">{{ $siswa->updated_at->format('d F Y H:i') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('siswa.edit', $siswa->nis) }}" class="btn btn-warning">
                            <i class="fas fa-edit mr-2"></i>Edit
                        </a>
                        <a href="{{ route('siswa.index') }}" class="btn btn-secondary ml-2">
                            <i class="fas fa-list mr-2"></i>Kembali ke Daftar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection