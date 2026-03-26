@extends('layouts.backend.master')


@section('title', 'Daftar Pengaduan')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Pengaduan</h3>
                    <div class="card-tools">
                        <a href="{{ url('/') }}#lapor" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Buat Pengaduan Baru
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIS</th>
                                    <th>Kategori</th>
                                    <th>Lokasi</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($inputaspirasi as $key => $item)
                                <tr>
                                    <td>{{ ($inputaspirasi->currentPage() - 1) * $inputaspirasi->perPage() + $key + 1 }}</td>
                                    <td>{{ $item->nis }}</td>
                                    <td>
                                        <span class="badge badge-info">{{ $item->kategori->keterangan ?? '-' }}</span>
                                    </td>
                                    <td>{{ $item->lokasi }}</td>
                                    <td>{{ Str::limit($item->keterangan, 50) }}</td>
                                    <td>
                                        @php
                                            $latestAspirasi = App\Models\Aspirasi::where('input_aspirasi_id', $item->id)->latest()->first();
                                        @endphp
                                        @if (empty($latestAspirasi) || empty($latestAspirasi->status))
                                            <span class="badge badge-warning">Menunggu</span>
                                        @else
                                            @php
                                                $badgeColor = $latestAspirasi->status == 'Selesai' ? 'badge-success' : 
                                                            ($latestAspirasi->status == 'Proses' ? 'badge-primary' : 'badge-warning');
                                            @endphp
                                            <span class="badge {{ $badgeColor }}">{{ $latestAspirasi->status }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <a href="{{ route('inputaspirasi.show', [$item->id]) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i> Detail
                                        </a>
                                        @if(auth()->user()->role === 'admin')
                                        <form action="{{ route('inputaspirasi.destroy', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pengaduan ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada data pengaduan</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-3">
                        {{ $inputaspirasi->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Auto-hide alert setelah 5 detik
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);
    });
</script>
@endsection