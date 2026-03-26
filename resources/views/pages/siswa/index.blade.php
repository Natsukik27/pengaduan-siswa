@extends('layouts.backend.master')

@section('title', 'Data Siswa - Sistem Pengaduan Siswa')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Siswa</h1>
        <a href="{{ route('siswa.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50 mr-2"></i>Tambah Siswa
        </a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Statistics Cards -->
            <div class="row mb-4">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Siswa</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $siswas->count() }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        PPLG</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $siswas->filter(function($siswa) { return str_contains($siswa->kelas, 'PPLG'); })->count() }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-laptop-code fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        AKL</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $siswas->filter(function($siswa) { return str_contains($siswa->kelas, 'AKL'); })->count() }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calculator fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        MPLB</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $siswas->filter(function($siswa) { return str_contains($siswa->kelas, 'MPLB'); })->count() }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-briefcase fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data Table -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Siswa</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead-light">
                                <tr>
                                    <th width="50">#</th>
                                    <th>NIS</th>
                                    <th>Kelas</th>
                                    <th>Jurusan</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Terakhir Diupdate</th>
                                    <th width="120" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($siswas as $siswa)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <strong>{{ $siswa->nis }}</strong>
                                    </td>
                                    <td>
                                        @if(str_contains($siswa->kelas, 'PPLG'))
                                            <span class="badge badge-primary">{{ $siswa->kelas }}</span>
                                        @elseif(str_contains($siswa->kelas, 'AKL'))
                                            <span class="badge badge-success">{{ $siswa->kelas }}</span>
                                        @elseif(str_contains($siswa->kelas, 'MPLB'))
                                            <span class="badge badge-info">{{ $siswa->kelas }}</span>
                                        @else
                                            <span class="badge badge-secondary">{{ $siswa->kelas }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if(str_contains($siswa->kelas, 'PPLG'))
                                            <span class="text-primary">Pengembangan Perangkat Lunak & Gim</span>
                                        @elseif(str_contains($siswa->kelas, 'AKL'))
                                            <span class="text-success">Akuntansi & Keuangan Lembaga</span>
                                        @elseif(str_contains($siswa->kelas, 'MPLB'))
                                            <span class="text-info">Manajemen Perkantoran & Layanan Bisnis</span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>{{ $siswa->created_at->format('d/m/Y H:i') }}</td>
                                    <td>{{ $siswa->updated_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('siswa.edit', $siswa->nis) }}" 
                                               class="btn btn-warning" 
                                               data-toggle="tooltip" 
                                               title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('siswa.destroy', $siswa->nis) }}" 
                                                  method="POST" 
                                                  class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-danger" 
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus siswa dengan NIS {{ $siswa->nis }}?')"
                                                        data-toggle="tooltip" 
                                                        title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4">
                                        <i class="fas fa-users fa-3x text-gray-300 mb-3"></i>
                                        <p class="text-muted">Belum ada data siswa.</p>
                                        <a href="{{ route('siswa.create') }}" class="btn btn-primary">
                                            <i class="fas fa-plus mr-2"></i>Tambah Siswa Pertama
                                        </a>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection

@push('styles')
<style>
    .table th {
        border-top: none;
        font-weight: 600;
    }
    
    .btn-group .btn {
        border-radius: 0;
    }
    
    .btn-group .btn:first-child {
        border-top-left-radius: 0.35rem;
        border-bottom-left-radius: 0.35rem;
    }
    
    .btn-group .btn:last-child {
        border-top-right-radius: 0.35rem;
        border-bottom-right-radius: 0.35rem;
    }
    
    .badge {
        font-size: 0.75em;
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        // Initialize DataTable
        $('#dataTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Indonesian.json"
            },
            "columnDefs": [
                { "orderable": false, "targets": [0, 6] }
            ],
            "order": [[1, 'asc']]
        });

        // Initialize tooltips
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endpush