@extends('layouts.backend.master')

@section('title', 'Beri Tanggapan Aspirasi')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Beri Tanggapan Aspirasi</h3>
                    <div class="card-tools">
                        <a href="{{ route('inputaspirasi.show', $inputaspirasi->id) }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
                <form action="{{ route('aspirasi.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <!-- Informasi Pengaduan -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="info-card bg-light p-4 rounded">
                                    <h5 class="mb-3 text-primary">
                                        <i class="fas fa-info-circle me-2"></i>Informasi Pengaduan
                                    </h5>
                                    <div class="row">
                                        <div class="col-md-4 mb-2">
                                            <strong><i class="fas fa-id-card me-2"></i>NIS:</strong><br>
                                            <span class="text-dark">{{ $inputaspirasi->nis }}</span>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <strong><i class="fas fa-tag me-2"></i>Kategori:</strong><br>
                                            <span class="badge badge-info">{{ $inputaspirasi->kategori->keterangan ?? '-' }}</span>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <strong><i class="fas fa-map-marker-alt me-2"></i>Lokasi:</strong><br>
                                            <span class="text-dark">{{ $inputaspirasi->lokasi }}</span>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <strong><i class="fas fa-file-alt me-2"></i>Keterangan:</strong><br>
                                            <div class="border-left pl-3 mt-1 text-dark">
                                                {{ $inputaspirasi->keterangan }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Tanggapan -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status" class="form-label">
                                        <strong>Status <span class="text-danger">*</span></strong>
                                    </label>
                                    <select class="form-control @error('status') is-invalid @enderror" 
                                            name="status" id="status" required>
                                        <option value="">Pilih Status</option>
                                        <option value="Menunggu" {{ old('status') == 'Menunggu' ? 'selected' : '' }}>
                                            Menunggu
                                        </option>
                                        <option value="Proses" {{ old('status') == 'Proses' ? 'selected' : '' }}>
                                            Proses
                                        </option>
                                        <option value="Selesai" {{ old('status') == 'Selesai' ? 'selected' : '' }}>
                                            Selesai
                                        </option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="admin_id" class="form-label">
                                        <strong>Penanggung Jawab</strong>
                                    </label>
                                    <input type="text" class="form-control bg-light" 
                                           value="{{ auth()->user()->name }}" readonly>
                                    <input type="hidden" name="admin_id" value="{{ auth()->id() }}">
                                    <small class="form-text text-muted">
                                        Anda sebagai penanggung jawab tanggapan ini
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="feedback" class="form-label">
                                        <strong>Feedback/Tanggapan <span class="text-danger">*</span></strong>
                                    </label>
                                    <textarea class="form-control @error('feedback') is-invalid @enderror" 
                                              name="feedback" 
                                              id="feedback" 
                                              rows="4" 
                                              placeholder="Masukkan tanggapan atau feedback untuk pengaduan ini..."
                                              required>{{ old('feedback') }}</textarea>
                                    @error('feedback')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Hidden input untuk input_aspirasi_id -->
                        <input type="hidden" name="input_aspirasi_id" value="{{ $inputaspirasi->id }}">
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane me-2"></i>Kirim Tanggapan
                        </button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection