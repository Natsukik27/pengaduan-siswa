@extends('layouts.backend.master')

@section('title', 'Detail Pengaduan')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail Pengaduan</h3>
                    <div class="card-tools">
                        <a href="{{ route('inputaspirasi.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>NIS:</strong></label>
                                <p class="form-control-plaintext border-bottom pb-2">{{ $inputaspirasi->nis }}</p>
                            </div>
                            
                            <div class="form-group">
                                <label><strong>Kategori:</strong></label>
                                <p class="form-control-plaintext border-bottom pb-2">
                                    <span class="badge badge-info">{{ $inputaspirasi->kategori->keterangan ?? '-' }}</span>
                                </p>
                            </div>
                            
                            <div class="form-group">
                                <label><strong>Lokasi:</strong></label>
                                <p class="form-control-plaintext border-bottom pb-2">{{ $inputaspirasi->lokasi }}</p>
                            </div>
                            
                            <div class="form-group">
                                <label><strong>Status:</strong></label>
                                <p class="form-control-plaintext border-bottom pb-2">
                                    @php
                                        $latestAspirasi = App\Models\Aspirasi::where('input_aspirasi_id', $inputaspirasi->id)->latest()->first();
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
                                </p>
                            </div>

                            <div class="form-group">
                                <label><strong>Tanggal Dibuat:</strong></label>
                                <p class="form-control-plaintext border-bottom pb-2">{{ $inputaspirasi->created_at->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Foto Bukti:</strong></label><br>
                                @if($inputaspirasi->foto)
                                    <img src="{{ asset('foto/' . $inputaspirasi->foto) }}" 
                                         alt="Foto Bukti" 
                                         class="img-thumbnail" 
                                         style="max-width: 100%; height: auto; max-height: 300px;">
                                @else
                                    <span class="text-muted">Tidak ada foto</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label><strong>Keterangan:</strong></label>
                                <div class="border p-3 rounded bg-light">
                                    {{ $inputaspirasi->keterangan }}
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- History Aspirasi -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">History Aspirasi</h4>
                                </div>
                                <div class="card-body">
                                    @php
                                        $histories = App\Models\Aspirasi::where('input_aspirasi_id', $inputaspirasi->id)
                                            ->orderBy('created_at', 'desc')
                                            ->get();
                                    @endphp
                                    
                                    @if($histories->count() > 0)
                                        @foreach($histories as $aspirasi)
                                            <div class="border-left border-primary pl-3 mb-3">
                                                <div class="d-flex justify-content-between">
                                                    <strong>{{ $aspirasi->created_at->format('d M Y H:i') }}</strong>
                                                    <span class="badge 
                                                        @if($aspirasi->status == 'Selesai') badge-success
                                                        @elseif($aspirasi->status == 'Proses') badge-primary
                                                        @else badge-warning @endif">
                                                        {{ $aspirasi->status }}
                                                    </span>
                                                </div>
                                                <p class="mb-1 mt-1">{{ $aspirasi->feedback }}</p>
                                                <small class="text-muted">Oleh: {{ $aspirasi->admin->name ?? 'Sistem' }}</small>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="text-center text-muted py-3">
                                            <i class="fas fa-history fa-2x mb-2"></i><br>
                                            Belum ada history tanggapan.
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="form-group">
                                <a href="{{ route('aspirasi.create', $inputaspirasi->id) }}" class="btn btn-primary">
                                    <i class="fas fa-comment"></i> Beri Tanggapan Aspirasi
                                </a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection