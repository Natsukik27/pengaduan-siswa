@extends('layouts.backend.master')

@section('title', 'Edit Profil - Sistem Pengaduan Siswa')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Profil</h1>
        <a href="{{ route('profile.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali ke Profil
        </a>
    </div>

    <!-- Content Row -->
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Profil</h6>
                    <span class="badge badge-info">User ID: {{ $user->id }}</span>
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.update') }}" method="POST" id="profileForm">
                        @csrf
                        @method('PUT')

                        <!-- Notifikasi -->
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle mr-2"></i>
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-triangle mr-2"></i>
                                Terdapat kesalahan dalam pengisian form. Silakan periksa kembali.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="font-weight-bold text-primary">
                                        Nama Lengkap *
                                        <i class="fas fa-info-circle text-muted ml-1" data-toggle="tooltip" title="Nama lengkap Anda yang akan ditampilkan di sistem"></i>
                                    </label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name', $user->name) }}" 
                                           required maxlength="255" placeholder="Masukkan nama lengkap">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">
                                        <i class="fas fa-character"></i> 
                                        <span id="nameCounter">{{ strlen(old('name', $user->name)) }}</span>/255 karakter
                                    </small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="font-weight-bold text-primary">
                                        Email *
                                        <i class="fas fa-info-circle text-muted ml-1" data-toggle="tooltip" title="Email aktif yang digunakan untuk login dan notifikasi"></i>
                                    </label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           id="email" name="email" value="{{ old('email', $user->email) }}" 
                                           required placeholder="contoh@email.com">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">
                                        <i class="fas fa-envelope"></i> Email harus valid dan unik
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone" class="font-weight-bold text-primary">
                                        Nomor Telepon
                                        <i class="fas fa-info-circle text-muted ml-1" data-toggle="tooltip" title="Nomor telepon aktif dengan format internasional"></i>
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">+62</span>
                                        </div>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                                               id="phone" name="phone" value="{{ old('phone', $user->phone) }}"
                                               placeholder="81234567890" maxlength="15">
                                    </div>
                                    @error('phone')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">
                                        <i class="fas fa-phone"></i> Contoh: 81234567890
                                    </small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold text-primary">Role & Status</label>
                                    <div class="d-flex flex-column">
                                        <span class="badge badge-primary mb-1 p-2">
                                            <i class="fas fa-user-tag mr-1"></i>Administrator
                                        </span>
                                        <span class="badge badge-success p-2">
                                            <i class="fas fa-circle mr-1"></i>
                                            {{ $user->email_verified_at ? 'Email Terverifikasi' : 'Email Belum Diverifikasi' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address" class="font-weight-bold text-primary">
                                Alamat Lengkap
                                <i class="fas fa-info-circle text-muted ml-1" data-toggle="tooltip" title="Alamat lengkap tempat tinggal Anda"></i>
                            </label>
                            <textarea class="form-control @error('address') is-invalid @enderror" 
                                      id="address" name="address" rows="3" 
                                      placeholder="Masukkan alamat lengkap..." 
                                      maxlength="500">{{ old('address', $user->address) }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                <i class="fas fa-map-marker-alt"></i> 
                                <span id="addressCounter">{{ strlen(old('address', $user->address)) }}</span>/500 karakter
                            </small>
                        </div>

                        <!-- Informasi Sistem -->
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold text-primary">
                                        <i class="fas fa-calendar-plus mr-1"></i>Tanggal Bergabung
                                    </label>
                                    <p class="form-control-plaintext border rounded p-2 bg-light">
                                        {{ $user->created_at->translatedFormat('l, d F Y') }}
                                        <br>
                                        <small class="text-muted">
                                            {{ $user->created_at->diffForHumans() }}
                                        </small>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold text-primary">
                                        <i class="fas fa-calendar-check mr-1"></i>Terakhir Diperbarui
                                    </label>
                                    <p class="form-control-plaintext border rounded p-2 bg-light">
                                        {{ $user->updated_at->translatedFormat('l, d F Y') }}
                                        <br>
                                        <small class="text-muted">
                                            {{ $user->updated_at->diffForHumans() }}
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="mt-4 pt-3 border-top">
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" id="submitBtn">
                                        <i class="fas fa-save mr-2"></i>Simpan Perubahan
                                    </button>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <small class="text-muted">
                                    <i class="fas fa-exclamation-triangle mr-1"></i>
                                    Field dengan tanda (*) wajib diisi
                                </small>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection

@push('styles')
<style>
    .form-control-plaintext {
        background-color: #f8f9fc !important;
        border: 1px solid #e3e6f0 !important;
    }
    
    .input-group-text {
        background-color: #e9ecef;
        border: 1px solid #d1d3e2;
    }
    
    .border-top {
        border-top: 1px solid #e3e6f0 !important;
    }
    
    /* Tooltip customization */
    .tooltip-inner {
        background-color: #4e73df;
        color: white;
    }
    
    .tooltip.bs-tooltip-top .arrow::before {
        border-top-color: #4e73df;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize tooltips
        $('[data-toggle="tooltip"]').tooltip();
        
        // Character counter for name
        const nameInput = document.getElementById('name');
        const nameCounter = document.getElementById('nameCounter');
        
        if (nameInput && nameCounter) {
            nameInput.addEventListener('input', function() {
                nameCounter.textContent = this.value.length;
            });
        }
        
        // Character counter for address
        const addressInput = document.getElementById('address');
        const addressCounter = document.getElementById('addressCounter');
        
        if (addressInput && addressCounter) {
            addressInput.addEventListener('input', function() {
                addressCounter.textContent = this.value.length;
            });
        }
        
        // Phone number formatting
        const phoneInput = document.getElementById('phone');
        if (phoneInput) {
            phoneInput.addEventListener('input', function() {
                // Remove non-numeric characters
                this.value = this.value.replace(/[^0-9]/g, '');
            });
        }
        
        // Form submission handling
        const profileForm = document.getElementById('profileForm');
        const submitBtn = document.getElementById('submitBtn');
        
        if (profileForm && submitBtn) {
            profileForm.addEventListener('submit', function() {
                // Disable submit button and show loading state
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Menyimpan...';
            });
        }
        
        // Auto-hide alerts after 5 seconds
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);
        
        // Prevent form resubmission on page refresh
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    });
</script>
@endpush