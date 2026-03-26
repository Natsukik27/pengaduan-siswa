@extends('layouts.backend.master')

@section('title', 'Edit Siswa - Sistem Pengaduan Siswa')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Siswa</h1>
        <a href="{{ route('siswa.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50 mr-2"></i>Kembali
        </a>
    </div>

    <!-- Content Row -->
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Siswa</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('siswa.update', $siswa->nis) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nis" class="font-weight-bold text-primary">NIS *</label>
                                    <input type="number" class="form-control @error('nis') is-invalid @enderror" 
                                        id="nis" name="nis" value="{{ old('nis', $siswa->nis) }}" 
                                        placeholder="Masukkan NIS" required readonly>
                                    @error('nis')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">NIS tidak dapat diubah</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kelas" class="font-weight-bold text-primary">Kelas *</label>
                                    <select class="form-control @error('kelas') is-invalid @enderror" 
                                        id="kelas" name="kelas" required>
                                        <option value="">Pilih Kelas</option>
                                        <optgroup label="Kelas X">
                                            <option value="X PPLG 1" {{ old('kelas', $siswa->kelas) == 'X PPLG 1' ? 'selected' : '' }}>X PPLG 1</option>
                                            <option value="X PPLG 2" {{ old('kelas', $siswa->kelas) == 'X PPLG 2' ? 'selected' : '' }}>X PPLG 2</option>
                                            <option value="X AKL" {{ old('kelas', $siswa->kelas) == 'X AKL' ? 'selected' : '' }}>X AKL</option>
                                            <option value="X MPLB" {{ old('kelas', $siswa->kelas) == 'X MPLB' ? 'selected' : '' }}>X MPLB</option>
                                        </optgroup>
                                        <optgroup label="Kelas XI">
                                            <option value="XI PPLG 1" {{ old('kelas', $siswa->kelas) == 'XI PPLG 1' ? 'selected' : '' }}>XI PPLG 1</option>
                                            <option value="XI PPLG 2" {{ old('kelas', $siswa->kelas) == 'XI PPLG 2' ? 'selected' : '' }}>XI PPLG 2</option>
                                            <option value="XI AKL" {{ old('kelas', $siswa->kelas) == 'XI AKL' ? 'selected' : '' }}>XI AKL</option>
                                            <option value="XI MPLB" {{ old('kelas', $siswa->kelas) == 'XI MPLB' ? 'selected' : '' }}>XI MPLB</option>
                                        </optgroup>
                                        <optgroup label="Kelas XII">
                                            <option value="XII PPLG 1" {{ old('kelas', $siswa->kelas) == 'XII PPLG 1' ? 'selected' : '' }}>XII PPLG 1</option>
                                            <option value="XII PPLG 2" {{ old('kelas', $siswa->kelas) == 'XII PPLG 2' ? 'selected' : '' }}>XII PPLG 2</option>
                                            <option value="XII AKL" {{ old('kelas', $siswa->kelas) == 'XII AKL' ? 'selected' : '' }}>XII AKL</option>
                                            <option value="XII MPLB" {{ old('kelas', $siswa->kelas) == 'XII MPLB' ? 'selected' : '' }}>XII MPLB</option>
                                        </optgroup>
                                    </select>
                                    @error('kelas')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save mr-2"></i>Update Data
                            </button>
                            
                        </div>
                    </form>
                </div>
            </div>

            <!-- Info Card -->
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Siswa</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>NIS:</strong> {{ $siswa->nis }}</p>
                            <p><strong>Kelas:</strong> 
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
                        <div class="col-md-6">
                            <p><strong>Dibuat Pada:</strong> {{ $siswa->created_at->format('d F Y H:i') }}</p>
                            <p><strong>Diperbarui Pada:</strong> {{ $siswa->updated_at->format('d F Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection