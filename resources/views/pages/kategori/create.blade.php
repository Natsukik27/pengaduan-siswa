@extends('layouts.backend.master')

@section('title', 'Tambah Kategori - Sistem Pengaduan Siswa')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Kategori</h1>
        <a href="{{ route('kategori.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50 mr-2"></i>Kembali
        </a>
    </div>

    <!-- Content Row -->
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Kategori</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('kategori.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="keterangan" class="font-weight-bold text-primary">Keterangan Kategori *</label>
                            <input type="text" 
                                   class="form-control @error('keterangan') is-invalid @enderror" 
                                   id="keterangan" 
                                   name="keterangan" 
                                   value="{{ old('keterangan') }}" 
                                   placeholder="Masukkan nama kategori (contoh: Fasilitas Sekolah)"
                                   required
                                   maxlength="50">
                            @error('keterangan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                <span id="charCount">0</span>/50 karakter. Contoh: Fasilitas Sekolah, Guru & Pengajaran, Administrasi, dll.
                            </small>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold text-primary">Ikon Kategori</label>
                            <div class="row text-center">
                                <div class="col-3 mb-3">
                                    <div class="icon-option border rounded p-3" data-icon="fas fa-school">
                                        <i class="fas fa-school fa-2x text-primary mb-2"></i>
                                        <div class="small">Fasilitas</div>
                                    </div>
                                </div>
                                <div class="col-3 mb-3">
                                    <div class="icon-option border rounded p-3" data-icon="fas fa-chalkboard-teacher">
                                        <i class="fas fa-chalkboard-teacher fa-2x text-success mb-2"></i>
                                        <div class="small">Pengajaran</div>
                                    </div>
                                </div>
                                <div class="col-3 mb-3">
                                    <div class="icon-option border rounded p-3" data-icon="fas fa-file-alt">
                                        <i class="fas fa-file-alt fa-2x text-info mb-2"></i>
                                        <div class="small">Administrasi</div>
                                    </div>
                                </div>
                                <div class="col-3 mb-3">
                                    <div class="icon-option border rounded p-3" data-icon="fas fa-users">
                                        <i class="fas fa-users fa-2x text-warning mb-2"></i>
                                        <div class="small">Sosial</div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="icon" name="icon" value="fas fa-folder">
                        </div>

                        <div class="form-group">
                            <label for="deskripsi" class="font-weight-bold text-primary">Deskripsi (Opsional)</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                      id="deskripsi" 
                                      name="deskripsi" 
                                      rows="3" 
                                      placeholder="Masukkan deskripsi kategori (opsional)">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="status" name="status" value="1" checked>
                                <label class="form-check-label" for="status">
                                    Kategori Aktif
                                </label>
                                <small class="form-text text-muted">
                                    Kategori non-aktif tidak akan muncul saat input pengaduan
                                </small>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save mr-2"></i>Simpan Kategori
                            </button>
                            <button type="reset" class="btn btn-outline-secondary ml-2">
                                <i class="fas fa-redo mr-2"></i>Reset
                            </button>
                            
                        </div>
                    </form>
                </div>
            </div>

            <!-- Info Card -->
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tips Kategori</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-primary">Kategori Umum:</h6>
                            <ul class="list-unstyled">
                                <li><i class="fas fa-check text-success mr-2"></i>Fasilitas Sekolah</li>
                                <li><i class="fas fa-check text-success mr-2"></i>Guru & Pengajaran</li>
                                <li><i class="fas fa-check text-success mr-2"></i>Administrasi</li>
                                <li><i class="fas fa-check text-success mr-2"></i>Kurikulum</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-primary">Kategori Khusus:</h6>
                            <ul class="list-unstyled">
                                <li><i class="fas fa-check text-success mr-2"></i>Bullying</li>
                                <li><i class="fas fa-check text-success mr-2"></i>Kesehatan</li>
                                <li><i class="fas fa-check text-success mr-2"></i>Ekstrakurikuler</li>
                                <li><i class="fas fa-check text-success mr-2"></i>Lainnya</li>
                            </ul>
                        </div>
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
    .icon-option {
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .icon-option:hover {
        background-color: #f8f9fa;
        border-color: #4e73df !important;
    }
    
    .icon-option.selected {
        background-color: #e3f2fd;
        border-color: #4e73df !important;
    }
    
    .form-control:focus {
        border-color: #4e73df;
        box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        // Character counter
        $('#keterangan').on('input', function() {
            const count = $(this).val().length;
            $('#charCount').text(count);
            
            if (count > 45) {
                $('#charCount').addClass('text-danger');
            } else {
                $('#charCount').removeClass('text-danger');
            }
        });

        // Icon selection
        $('.icon-option').click(function() {
            $('.icon-option').removeClass('selected');
            $(this).addClass('selected');
            $('#icon').val($(this).data('icon'));
        });

        // Trigger input event on load
        $('#keterangan').trigger('input');
    });
</script>
@endpush