@extends('layouts.backend.master')

@section('title', 'Profil Pengguna - Sistem Pengaduan Siswa')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profil Pengguna</h1>
        <div>
            <a href="{{ route('profile.edit') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-edit fa-sm text-white-50"></i> Edit Profil
            </a>
            <span class="badge badge-info ml-2">User ID: {{ $user->id }}</span>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Profile Card -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Foto Profil</h6>
                    @if($user->avatar)
                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="confirmRemoveAvatar()">
                            <i class="fas fa-trash"></i>
                        </button>
                    @endif
                </div>
                <div class="card-body text-center">
                    <!-- Avatar -->
                    <div class="mb-4 position-relative">
                        @if($user->avatar && Storage::disk('public')->exists('avatars/' . $user->avatar))
                            <img src="{{ asset('storage/avatars/' . $user->avatar) }}?v={{ time() }}" 
                                 class="img-fluid rounded-circle shadow" 
                                 alt="Avatar" 
                                 style="width: 150px; height: 150px; object-fit: cover; border: 3px solid #4e73df;"
                                 id="avatarPreview">
                            <div class="position-absolute top-0 end-0 mt-2 me-2">
                                <span class="badge badge-success">
                                    <i class="fas fa-check"></i>
                                </span>
                            </div>
                        @else
                            <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center mx-auto shadow" 
                                 style="width: 150px; height: 150px; border: 3px solid #4e73df;"
                                 id="avatarPreview">
                                <span class="text-white font-weight-bold h4">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </span>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Upload Form -->
                    <form action="{{ route('profile.update-avatar') }}" method="POST" enctype="multipart/form-data" id="avatarForm">
                        @csrf
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="avatar" name="avatar" accept="image/*" required>
                                <label class="custom-file-label" for="avatar" id="avatarLabel">
                                    <i class="fas fa-camera mr-2"></i>Pilih foto...
                                </label>
                            </div>
                            @error('avatar')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle mr-1"></i>
                                Format: JPEG, PNG, JPG, GIF (Max: 2MB)
                            </small>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" id="uploadBtn">
                            <i class="fas fa-upload mr-2"></i>Upload Foto
                        </button>
                    </form>

                    <!-- Remove Avatar Form (Hidden) -->
                    @if($user->avatar)
                    <form action="{{ route('profile.remove-avatar') }}" method="POST" id="removeAvatarForm" class="d-none">
                        @csrf
                        @method('DELETE')
                    </form>
                    @endif
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-chart-bar mr-2"></i>Statistik Pengaduan
                    </h6>
                </div>
                <div class="card-body">
                    @php
                        use App\Models\Aspirasi;
                        $totalPengaduan = Aspirasi::count();
                        $pengaduanSelesai = Aspirasi::where('status', 'selesai')->count();
                        $pengaduanProses = Aspirasi::where('status', 'proses')->count();
                        $pengaduanMenunggu = Aspirasi::where('status', 'menunggu')->count();
                        
                        $progressPercentage = $totalPengaduan > 0 ? round(($pengaduanSelesai / $totalPengaduan) * 100) : 0;
                    @endphp
                    
                    <!-- Progress Bar -->
                    <div class="mb-4">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="text-sm font-weight-bold">Progress Penyelesaian</span>
                            <span class="text-sm font-weight-bold">{{ $progressPercentage }}%</span>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-success" role="progressbar" 
                                 style="width: {{ $progressPercentage }}%;" 
                                 aria-valuenow="{{ $progressPercentage }}" 
                                 aria-valuemin="0" 
                                 aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="row text-center">
                        <div class="col-6 mb-3">
                            <div class="text-primary font-weight-bold h5">{{ $totalPengaduan }}</div>
                            <div class="text-xs text-muted">
                                <i class="fas fa-inbox mr-1"></i>Total
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="text-success font-weight-bold h5">{{ $pengaduanSelesai }}</div>
                            <div class="text-xs text-muted">
                                <i class="fas fa-check-circle mr-1"></i>Selesai
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-info font-weight-bold h5">{{ $pengaduanProses }}</div>
                            <div class="text-xs text-muted">
                                <i class="fas fa-spinner mr-1"></i>Proses
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-warning font-weight-bold h5">{{ $pengaduanMenunggu }}</div>
                            <div class="text-xs text-muted">
                                <i class="fas fa-clock mr-1"></i>Menunggu
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Details -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Profil</h6>
                    <span class="badge badge-{{ $user->email_verified_at ? 'success' : 'warning' }}">
                        <i class="fas fa-{{ $user->email_verified_at ? 'check' : 'exclamation-triangle' }} mr-1"></i>
                        {{ $user->email_verified_at ? 'Terverifikasi' : 'Belum Verifikasi' }}
                    </span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold text-primary">Nama Lengkap</label>
                                <p class="form-control-plaintext border-bottom pb-2">
                                    <i class="fas fa-user mr-2 text-gray-400"></i>
                                    {{ $user->name ?? '-' }}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold text-primary">Email</label>
                                <p class="form-control-plaintext border-bottom pb-2">
                                    <i class="fas fa-envelope mr-2 text-gray-400"></i>
                                    {{ $user->email ?? '-' }}
                                    @if($user->email_verified_at)
                                        <span class="badge badge-success badge-sm ml-2">
                                            <i class="fas fa-check"></i>
                                        </span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold text-primary">Nomor Telepon</label>
                                <p class="form-control-plaintext border-bottom pb-2">
                                    <i class="fas fa-phone mr-2 text-gray-400"></i>
                                    @if($user->phone)
                                        +62 {{ $user->phone }}
                                    @else
                                        <span class="text-muted">Belum diisi</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold text-primary">Role & Status</label>
                                <p class="form-control-plaintext border-bottom pb-2">
                                    <i class="fas fa-user-tag mr-2 text-gray-400"></i>
                                    <span class="badge badge-primary">
                                        {{ $user->role ? ucfirst($user->role) : 'Administrator' }}
                                    </span>
                                    <span class="badge badge-success ml-1">
                                        Aktif
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold text-primary">Alamat</label>
                        <p class="form-control-plaintext border-bottom pb-2">
                            <i class="fas fa-map-marker-alt mr-2 text-gray-400"></i>
                            @if($user->address)
                                {{ $user->address }}
                            @else
                                <span class="text-muted">Belum diisi</span>
                            @endif
                        </p>
                    </div>

                    <div class="row">
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

                    <div class="mt-4 pt-3 border-top">
                        <div class="row">
                            
                            <div class="col-md-4">
                                <button type="button" class="btn btn-outline-secondary btn-block" data-toggle="modal" data-target="#changePasswordModal">
                                    <i class="fas fa-key mr-2"></i>Ubah Password
                                </button>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            <!-- Activity Log -->
            <div class="card shadow">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-history mr-2"></i>Aktivitas Terbaru
                    </h6>
                    @php
                        $recentActivities = [
                            [
                                'activity' => 'Login ke sistem',
                                'time' => now()->format('H:i'),
                                'date' => 'Hari ini',
                                'details' => 'IP: ' . request()->ip(),
                                'icon' => 'fas fa-sign-in-alt text-success'
                            ],
                            [
                                'activity' => 'Update profil pengguna',
                                'time' => now()->subHours(2)->format('H:i'),
                                'date' => 'Hari ini', 
                                'details' => 'Memperbarui informasi profil',
                                'icon' => 'fas fa-user-edit text-primary'
                            ],
                            [
                                'activity' => 'Mengelola data pengaduan',
                                'time' => now()->subDays(1)->format('H:i'),
                                'date' => 'Kemarin',
                                'details' => 'Memproses pengaduan masuk',
                                'icon' => 'fas fa-tasks text-info'
                            ]
                        ];
                        $activityCount = count($recentActivities);
                    @endphp
                    <span class="badge badge-primary">{{ $activityCount }} Aktivitas</span>
                </div>
                <div class="card-body">
                    <div class="activity-list">
                        @if($activityCount > 0)
                            @foreach($recentActivities as $index => $activity)
                            <div class="activity-item mb-3">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0">
                                        <i class="{{ $activity['icon'] }} fa-lg mt-1"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <strong class="d-block">{{ $activity['activity'] }}</strong>
                                                <small class="text-muted">{{ $activity['details'] }}</small>
                                            </div>
                                            <div class="text-right">
                                                <small class="text-muted d-block">{{ $activity['date'] }}</small>
                                                <small class="text-muted">{{ $activity['time'] }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="text-center text-muted py-4">
                                <i class="fas fa-history fa-3x mb-3"></i>
                                <p class="mb-0">Belum ada aktivitas terbaru</p>
                                <small>Aktivitas akan tercatat ketika Anda menggunakan sistem</small>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- Change Password Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changePasswordModalLabel">
                    <i class="fas fa-key mr-2"></i>Ubah Password
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('profile.update-password') }}" method="POST" id="passwordForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="current_password" class="font-weight-bold">Password Saat Ini *</label>
                        <input type="password" class="form-control @error('current_password') is-invalid @enderror" 
                               id="current_password" name="current_password" required
                               placeholder="Masukkan password saat ini">
                        @error('current_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="new_password" class="font-weight-bold">Password Baru *</label>
                        <input type="password" class="form-control @error('new_password') is-invalid @enderror" 
                               id="new_password" name="new_password" required minlength="8"
                               placeholder="Minimal 8 karakter">
                        @error('new_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">
                            <i class="fas fa-info-circle mr-1"></i>Password harus minimal 8 karakter
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="new_password_confirmation" class="font-weight-bold">Konfirmasi Password Baru *</label>
                        <input type="password" class="form-control" id="new_password_confirmation" 
                               name="new_password_confirmation" required
                               placeholder="Ketik ulang password baru">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-2"></i>Batal
                    </button>
                    <button type="submit" class="btn btn-primary" id="savePasswordBtn">
                        <i class="fas fa-save mr-2"></i>Simpan Password
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .form-control-plaintext {
        padding: 0.375rem 0;
        margin-bottom: 0;
        background-color: transparent;
        border: solid transparent;
        border-width: 1px 0;
    }
    
    .activity-item {
        padding: 12px 0;
        border-bottom: 1px solid #e3e6f0;
        transition: all 0.2s;
    }
    
    .activity-item:hover {
        background-color: #f8f9fc;
        border-radius: 8px;
        padding: 12px 15px;
        margin: 0 -15px;
    }
    
    .activity-item:last-child {
        border-bottom: none;
    }
    
    .custom-file-label::after {
        content: "Browse";
    }
    
    .border-bottom {
        border-bottom: 1px solid #e3e6f0 !important;
    }
    
    .text-xs {
        font-size: 0.75rem;
    }
    
    .badge-sm {
        font-size: 0.6rem;
        padding: 0.2em 0.4em;
    }
    
    .border-top {
        border-top: 1px solid #e3e6f0 !important;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const avatarInput = document.getElementById('avatar');
        const avatarLabel = document.getElementById('avatarLabel');
        const avatarForm = document.getElementById('avatarForm');
        const uploadBtn = document.getElementById('uploadBtn');

        if (avatarInput && avatarForm) {
            // Preview file name
            avatarInput.addEventListener('change', function(e) {
                const fileName = e.target.files[0]?.name || 'Pilih foto...';
                if (avatarLabel) {
                    avatarLabel.textContent = fileName;
                }
                
                // Auto preview image
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const avatarPreview = document.getElementById('avatarPreview');
                        if (avatarPreview) {
                            if (avatarPreview.tagName === 'IMG') {
                                avatarPreview.src = e.target.result;
                            } else {
                                // Replace initial avatar with image preview
                                const newImg = document.createElement('img');
                                newImg.src = e.target.result;
                                newImg.className = 'img-fluid rounded-circle shadow';
                                newImg.style = 'width: 150px; height: 150px; object-fit: cover; border: 3px solid #4e73df;';
                                newImg.id = 'avatarPreview';
                                avatarPreview.parentNode.replaceChild(newImg, avatarPreview);
                            }
                        }
                    }
                    reader.readAsDataURL(file);
                }

                // Auto submit form dengan loading state
                if (uploadBtn) {
                    uploadBtn.disabled = true;
                    uploadBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Mengupload...';
                }

                // Submit form setelah 500ms untuk memberi waktu preview
                setTimeout(() => {
                    avatarForm.submit();
                }, 500);
            });
        }

        // Validasi form password
        const passwordForm = document.getElementById('passwordForm');
        const savePasswordBtn = document.getElementById('savePasswordBtn');
        
        if (passwordForm && savePasswordBtn) {
            passwordForm.addEventListener('submit', function(e) {
                const newPassword = document.getElementById('new_password').value;
                const confirmPassword = document.getElementById('new_password_confirmation').value;
                
                if (newPassword !== confirmPassword) {
                    e.preventDefault();
                    alert('Konfirmasi password tidak sesuai!');
                    return false;
                }
                
                // Show loading state
                savePasswordBtn.disabled = true;
                savePasswordBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Menyimpan...';
                
                return true;
            });
        }

        // Confirm remove avatar
        window.confirmRemoveAvatar = function() {
            if (confirm('Apakah Anda yakin ingin menghapus foto profil?')) {
                document.getElementById('removeAvatarForm').submit();
            }
        }

        // Auto-hide alerts setelah 5 detik
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);

        // Initialize tooltips
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    });
</script>
@endpush