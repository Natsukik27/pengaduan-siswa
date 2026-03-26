@extends('layouts.backend.master')

@section('title', 'Laporan Pengaduan')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan Pengaduan Siswa</h1>
        <div class="btn-group">
            <a href="{{ url('/laporan/pdf') }}?{{ http_build_query(request()->all()) }}" 
               class="btn btn-primary shadow-sm" target="_blank">
                <i class="fas fa-print fa-sm text-white-50 me-2"></i>Export Semua ke PDF
            </a>
            <a href="{{ route('inputaspirasi.index') }}" class="btn btn-secondary shadow-sm ms-2">
                <i class="fas fa-arrow-left fa-sm text-white-50 me-2"></i>Kembali ke Pengaduan
            </a>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            
            <!-- Filter Section -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex align-items-center">
                    <i class="fas fa-filter text-primary me-2"></i>
                    <h6 class="m-0 font-weight-bold text-primary">Filter Laporan</h6>
                </div>
                <div class="card-body">
                    <form action="{{ url('/laporan') }}" method="GET" id="filterForm">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="start_date" class="form-label fw-semibold text-dark">Tanggal Mulai</label>
                                    <input type="date" name="start_date" class="form-control border-primary" 
                                           value="{{ request('start_date') }}" id="start_date">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="end_date" class="form-label fw-semibold text-dark">Tanggal Akhir</label>
                                    <input type="date" name="end_date" class="form-control border-primary" 
                                           value="{{ request('end_date') }}" id="end_date">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status" class="form-label fw-semibold text-dark">Status</label>
                                    <select name="status" class="form-control border-primary" id="status">
                                        <option value="">Semua Status</option>
                                        <option value="Menunggu" {{ request('status') == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                                        <option value="Proses" {{ request('status') == 'Proses' ? 'selected' : '' }}>Proses</option>
                                        <option value="Selesai" {{ request('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search me-2"></i>Terapkan Filter
                                </button>
                                <a href="{{ url('/laporan') }}" class="btn btn-outline-secondary ms-2">
                                    <i class="fas fa-refresh me-2"></i>Reset Filter
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="row mb-4">
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
                                    <i class="fas fa-file-alt fa-2x text-gray-300"></i>
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
                                        Menunggu</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $menungguCount }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clock fa-2x text-gray-300"></i>
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
                                        Proses</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $prosesCount }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-spinner fa-2x text-gray-300"></i>
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
                                        Selesai</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $selesaiCount }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-check fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data Table -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-table text-primary me-2"></i>
                        <h6 class="m-0 font-weight-bold text-primary">Data Pengaduan</h6>
                    </div>
                    @if(request()->anyFilled(['start_date', 'end_date', 'status']))
                        <span class="badge bg-info">
                            <i class="fas fa-filter me-1"></i>Filter Aktif
                        </span>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                            <thead class="thead-light">
                                <tr>
                                    <th width="50" class="text-center">No</th>
                                    <th width="100">Tanggal</th>
                                    <th width="100">NIS</th>
                                    <th width="120">Kategori</th>
                                    <th width="150">Lokasi</th>
                                    <th width="250">Isi Pengaduan</th>
                                    <th width="100" class="text-center">Status</th>
                                    <th width="200">Feedback</th>
                                    <th width="120">Tgl Feedback</th>
                                    <th width="100" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($inputaspirasis as $key => $item)
                                @php
                                    $latestAspirasi = $item->latestAspirasi;
                                @endphp
                                <tr>
                                    <td class="text-center fw-semibold align-middle">{{ $key + 1 }}</td>
                                    <td class="align-middle">
                                        <span class="badge bg-light text-dark p-2">
                                            {{ $item->created_at->format('d/m/Y') }}
                                        </span>
                                    </td>
                                    <td class="align-middle">
                                        <strong class="text-primary">{{ $item->nis }}</strong>
                                    </td>
                                    <td class="align-middle">
                                        <span class="badge bg-info text-white p-2">
                                            {{ $item->kategori->keterangan ?? '-' }}
                                        </span>
                                    </td>
                                    <td class="align-middle">
                                        <span class="text-muted">{{ $item->lokasi }}</span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="d-block text-truncate" style="max-width: 240px;" 
                                              data-bs-toggle="tooltip" title="{{ $item->keterangan }}">
                                            {{ $item->keterangan }}
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">
                                        @if (empty($latestAspirasi) || empty($latestAspirasi->status))
                                            <span class="badge bg-warning text-white p-2">
                                                <i class="fas fa-clock me-1"></i>Menunggu
                                            </span>
                                        @else
                                            @php
                                                $badgeColor = $latestAspirasi->status == 'Selesai' ? 'bg-success' : 
                                                            ($latestAspirasi->status == 'Proses' ? 'bg-primary' : 'bg-warning');
                                                $icon = $latestAspirasi->status == 'Selesai' ? 'fa-check' : 
                                                       ($latestAspirasi->status == 'Proses' ? 'fa-spinner' : 'fa-clock');
                                            @endphp
                                            <span class="badge {{ $badgeColor }} text-white p-2">
                                                <i class="fas {{ $icon }} me-1"></i>{{ $latestAspirasi->status }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        @if($latestAspirasi && $latestAspirasi->feedback)
                                            <div class="d-block text-truncate" style="max-width: 190px;"
                                                  data-bs-toggle="tooltip" title="{{ $latestAspirasi->feedback }}">
                                                {{ $latestAspirasi->feedback }}
                                            </div>
                                        @else
                                            <span class="text-muted fst-italic">-</span>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        @if($latestAspirasi)
                                            <span class="text-muted">{{ $latestAspirasi->created_at->format('d/m/Y') }}</span>
                                        @else
                                            <span class="text-muted fst-italic">-</span>
                                        @endif
                                    </td>
                                    <td class="text-center align-middle">
                                        <div class="btn-group-vertical btn-group-sm">
                                            <a href="{{ route('laporan.pdf-single', $item->id) }}" 
                                               class="btn btn-danger btn-sm mb-1" 
                                               title="Export PDF Individual"
                                               target="_blank">
                                                <i class="fas fa-file-pdf"></i> PDF
                                            </a>
                                            <a href="{{ route('inputaspirasi.show', $item->id) }}" 
                                               class="btn btn-info btn-sm text-white"
                                               title="Detail Pengaduan">
                                                <i class="fas fa-eye"></i> Detail
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10" class="text-center py-5">
                                        <div class="empty-state">
                                            <i class="fas fa-inbox fa-4x text-gray-300 mb-3"></i>
                                            <h5 class="text-gray-500">Tidak ada data pengaduan</h5>
                                            <p class="text-muted mb-4">
                                                @if(request()->anyFilled(['start_date', 'end_date', 'status']))
                                                    Tidak ada data yang sesuai dengan filter pencarian Anda.
                                                @else
                                                    Belum ada pengaduan yang tercatat dalam sistem.
                                                @endif
                                            </p>
                                            @if(request()->anyFilled(['start_date', 'end_date', 'status']))
                                                <a href="{{ url('/laporan') }}" class="btn btn-primary">
                                                    <i class="fas fa-list me-2"></i>Tampilkan Semua Data
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if($inputaspirasis->hasPages())
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div class="text-muted">
                            Menampilkan {{ $inputaspirasis->firstItem() ?? 0 }} - {{ $inputaspirasis->lastItem() ?? 0 }} 
                            dari {{ $inputaspirasis->total() }} data
                        </div>
                        <nav>
                            {{ $inputaspirasis->links() }}
                        </nav>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Summary Section -->
            @if($inputaspirasis->count() > 0)
            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header py-3 d-flex align-items-center">
                            <i class="fas fa-chart-bar text-primary me-2"></i>
                            <h6 class="m-0 font-weight-bold text-primary">Ringkasan Laporan</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <div class="border-start border-primary border-4 ps-3">
                                        <small class="text-muted d-block">Periode Laporan</small>
                                        <strong class="text-dark">
                                            @if(request('start_date') && request('end_date'))
                                                {{ \Carbon\Carbon::parse(request('start_date'))->format('d/m/Y') }} - {{ \Carbon\Carbon::parse(request('end_date'))->format('d/m/Y') }}
                                            @else
                                                Semua Data
                                            @endif
                                        </strong>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="border-start border-success border-4 ps-3">
                                        <small class="text-muted d-block">Total Data</small>
                                        <strong class="text-dark">{{ $inputaspirasis->total() }} pengaduan</strong>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="border-start border-info border-4 ps-3">
                                        <small class="text-muted d-block">Tanggal Cetak</small>
                                        <strong class="text-dark">{{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}</strong>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="border-start border-warning border-4 ps-3">
                                        <small class="text-muted d-block">Rate Penyelesaian</small>
                                        <strong class="text-dark">
                                            @php
                                                $rate = $totalPengaduan > 0 ? round(($selesaiCount / $totalPengaduan) * 100, 1) : 0;
                                            @endphp
                                            {{ $rate }}%
                                        </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection

@push('styles')
<style>
.card {
    border: none;
    border-radius: 0.5rem;
    box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
}

.card-header {
    border-bottom: 1px solid #e3e6f0;
    background-color: #f8f9fc;
    font-weight: 600;
}

.table th {
    border-top: none;
    font-weight: 600;
    color: #4e73df;
    background-color: #f8f9fc;
    vertical-align: middle;
    padding: 12px 8px;
}

.table td {
    vertical-align: middle;
    padding: 10px 8px;
}

.badge {
    font-size: 0.75em;
    font-weight: 500;
    padding: 6px 10px;
}

.border-left-primary {
    border-left: 0.25rem solid #4e73df !important;
}

.border-left-success {
    border-left: 0.25rem solid #1cc88a !important;
}

.border-left-info {
    border-left: 0.25rem solid #36b9cc !important;
}

.border-left-warning {
    border-left: 0.25rem solid #f6c23e !important;
}

.empty-state {
    padding: 2rem 0;
}

.form-control:focus {
    border-color: #4e73df;
    box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
}

.table-hover tbody tr:hover {
    background-color: rgba(78, 115, 223, 0.05);
    transform: translateY(-1px);
    transition: all 0.2s ease;
}

.text-truncate {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.btn {
    border-radius: 0.35rem;
    font-weight: 500;
}

.pagination {
    margin-bottom: 0;
}

.alert {
    border-radius: 0.5rem;
    border: none;
}

/* Improved readability */
.table {
    font-size: 0.9rem;
}

.card-body {
    font-size: 0.9rem;
}

/* Better spacing */
.mb-4 {
    margin-bottom: 1.5rem !important;
}

/* Button group styling */
.btn-group-vertical .btn {
    margin-bottom: 2px;
    border-radius: 0.25rem;
}

.btn-group-vertical .btn:last-child {
    margin-bottom: 0;
}

/* Status badge improvements */
.badge.bg-warning {
    background-color: #f6c23e !important;
    color: white !important;
}

.badge.bg-primary {
    background-color: #4e73df !important;
    color: white !important;
}

.badge.bg-success {
    background-color: #1cc88a !important;
    color: white !important;
}

.badge.bg-info {
    background-color: #36b9cc !important;
    color: white !important;
}

/* Responsive improvements */
@media (max-width: 768px) {
    .table-responsive {
        font-size: 0.8rem;
    }
    
    .badge {
        font-size: 0.7em;
        padding: 4px 8px;
    }
    
    .card-header h6 {
        font-size: 0.9rem;
    }
    
    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.775rem;
    }
    
    .btn-group-vertical .btn {
        font-size: 0.7rem;
        padding: 0.2rem 0.4rem;
    }
}

/* Loading state */
.opacity-50 {
    opacity: 0.5;
    transition: opacity 0.3s ease;
}
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        // Initialize tooltips
        $('[data-bs-toggle="tooltip"]').tooltip({
            trigger: 'hover',
            placement: 'top'
        });

        // Auto-hide alerts after 5 seconds
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);

        // Date validation
        $('#start_date, #end_date').change(function() {
            const startDate = $('#start_date').val();
            const endDate = $('#end_date').val();
            
            if (startDate && endDate && startDate > endDate) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Perhatian',
                    text: 'Tanggal mulai tidak boleh lebih besar dari tanggal akhir',
                    confirmButtonColor: '#4e73df'
                });
                $('#start_date').val('');
                $('#end_date').val('');
            }
        });

        // Add loading state to filter form
        $('#filterForm').on('submit', function() {
            const submitBtn = $(this).find('button[type="submit"]');
            submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i>Memproses...');
            
            // Show loading state on table
            $('.table-responsive').addClass('opacity-50');
        });

        // Auto-submit form when pressing enter in filter fields
        $('#filterForm input').keypress(function(e) {
            if (e.which == 13) {
                $('#filterForm').submit();
            }
        });

        // Highlight active filters
        function highlightActiveFilters() {
            const hasActiveFilters = window.location.search.includes('start_date') || 
                                   window.location.search.includes('end_date') || 
                                   window.location.search.includes('status');
            
            if (hasActiveFilters) {
                $('.card-header').addClass('bg-light');
            }
        }

        highlightActiveFilters();

        // PDF export loading state
        $('a[href*="pdf"]').on('click', function() {
            const btn = $(this);
            const originalHtml = btn.html();
            btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-1"></i>Loading...');
            
            // Reset after 5 seconds if still disabled
            setTimeout(function() {
                if (btn.prop('disabled')) {
                    btn.prop('disabled', false).html(originalHtml);
                }
            }, 5000);
        });
    });
</script>
@endpush