<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Sistem Pengaduan Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-blue: #1e40af;
            --secondary-blue: #3b82f6;
            --light-blue: #dbeafe;
            --accent-blue: #60a5fa;
            --dark-blue: #1e3a8a;
        }
        
        body {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .register-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 100%;
            max-width: 1000px;
        }
        
        .register-left {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            color: white;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .register-right {
            padding: 40px;
        }
        
        .logo-container {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .logo {
            width: 80px;
            height: 80px;
            background-color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            color: var(--primary-blue);
            font-size: 32px;
        }
        
        .system-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .system-subtitle {
            font-size: 16px;
            opacity: 0.9;
        }
        
        .benefit-list {
            margin-top: 30px;
        }
        
        .benefit-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .benefit-icon {
            width: 30px;
            height: 30px;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 14px;
        }
        
        .register-header {
            text-align: center;
            margin-bottom: 30px;
            color: var(--dark-blue);
        }
        
        .form-control {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #e2e8f0;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--accent-blue);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }
        
        .btn-register {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            border: none;
            color: white;
            padding: 12px;
            border-radius: 8px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s;
        }
        
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(30, 64, 175, 0.3);
        }
        
        .form-footer {
            text-align: center;
            margin-top: 20px;
        }
        
        .form-footer a {
            color: var(--secondary-blue);
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .form-footer a:hover {
            color: var(--primary-blue);
        }
        
        .input-group-icon {
            position: relative;
        }
        
        .input-group-icon .form-control {
            padding-left: 45px;
        }
        
        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
        }
        
        .password-strength {
            height: 5px;
            border-radius: 5px;
            margin-top: 5px;
            background-color: #e2e8f0;
            overflow: hidden;
        }
        
        .password-strength-bar {
            height: 100%;
            width: 0%;
            transition: width 0.3s, background-color 0.3s;
        }
        
        .password-requirements {
            font-size: 12px;
            color: #64748b;
            margin-top: 5px;
        }
        
        .requirement {
            display: flex;
            align-items: center;
            margin-bottom: 3px;
        }
        
        .requirement i {
            margin-right: 5px;
            font-size: 10px;
        }
        
        .requirement.met {
            color: #10b981;
        }
        
        @media (max-width: 768px) {
            .register-left {
                padding: 30px;
            }
            
            .register-right {
                padding: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="row g-0">
            <div class="col-md-5">
                <div class="register-left">
                    <div class="logo-container">
                        <div class="logo">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h1 class="system-title">Sistem Pengaduan Siswa</h1>
                        <p class="system-subtitle">Bergabunglah untuk menyampaikan aspirasi</p>
                    </div>
                    
                    <div class="benefit-list">
                        <div class="benefit-item">
                            <div class="benefit-icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div>
                                <h5>Daftar Sekarang</h5>
                                <p>Bergabung dengan komunitas siswa aktif</p>
                            </div>
                        </div>
                        
                        <div class="benefit-item">
                            <div class="benefit-icon">
                                <i class="fas fa-voice"></i>
                            </div>
                            <div>
                                <h5>Suara Didengar</h5>
                                <p>Sampaikan keluhan dan aspirasi secara langsung</p>
                            </div>
                        </div>
                        
                        <div class="benefit-item">
                            <div class="benefit-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div>
                                <h5>Privasi Terjaga</h5>
                                <p>Identitas Anda akan kami rahasiakan</p>
                            </div>
                        </div>
                        
                        <div class="benefit-item">
                            <div class="benefit-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div>
                                <h5>Proses Cepat</h5>
                                <p>Pengaduan akan segera ditindaklanjuti</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-7">
                <div class="register-right">
                    <div class="register-header">
                        <h2>Buat Akun Baru</h2>
                        <p class="text-muted">Isi data diri Anda untuk mendaftar</p>
                    </div>
                    
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        <div class="row mb-3">
                            <div class="col-md-12 input-group-icon">
                                <i class="fas fa-user input-icon"></i>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                                       name="name" value="{{ old('name') }}" required autocomplete="name" autofocus 
                                       placeholder="Nama Lengkap">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-12 input-group-icon">
                                <i class="fas fa-envelope input-icon"></i>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                       name="email" value="{{ old('email') }}" required autocomplete="email" 
                                       placeholder="Alamat Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-12 input-group-icon">
                                <i class="fas fa-lock input-icon"></i>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                       name="password" required autocomplete="new-password" placeholder="Kata Sandi">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="password-strength">
                                    <div class="password-strength-bar" id="password-strength-bar"></div>
                                </div>
                                <div class="password-requirements">
                                    <div class="requirement" id="req-length">
                                        <i class="fas fa-times"></i> Minimal 8 karakter
                                    </div>
                                    <div class="requirement" id="req-uppercase">
                                        <i class="fas fa-times"></i> Mengandung huruf besar
                                    </div>
                                    <div class="requirement" id="req-lowercase">
                                        <i class="fas fa-times"></i> Mengandung huruf kecil
                                    </div>
                                    <div class="requirement" id="req-number">
                                        <i class="fas fa-times"></i> Mengandung angka
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-4">
                            <div class="col-md-12 input-group-icon">
                                <i class="fas fa-lock input-icon"></i>
                                <input id="password-confirm" type="password" class="form-control" 
                                       name="password_confirmation" required autocomplete="new-password" 
                                       placeholder="Konfirmasi Kata Sandi">
                            </div>
                        </div>
                        
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-register">
                                <i class="fas fa-user-plus me-2"></i> Daftar Sekarang
                            </button>
                        </div>
                        
                        <div class="form-footer">
                            <p>
                                Sudah punya akun? 
                                <a href="{{ route('login') }}">Masuk di sini</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Password strength indicator
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthBar = document.getElementById('password-strength-bar');
            const requirements = {
                length: document.getElementById('req-length'),
                uppercase: document.getElementById('req-uppercase'),
                lowercase: document.getElementById('req-lowercase'),
                number: document.getElementById('req-number')
            };
            
            let strength = 0;
            let totalRequirements = 4;
            let metRequirements = 0;
            
            // Check password length
            if (password.length >= 8) {
                strength += 25;
                metRequirements++;
                requirements.length.classList.add('met');
                requirements.length.querySelector('i').className = 'fas fa-check';
            } else {
                requirements.length.classList.remove('met');
                requirements.length.querySelector('i').className = 'fas fa-times';
            }
            
            // Check uppercase letters
            if (/[A-Z]/.test(password)) {
                strength += 25;
                metRequirements++;
                requirements.uppercase.classList.add('met');
                requirements.uppercase.querySelector('i').className = 'fas fa-check';
            } else {
                requirements.uppercase.classList.remove('met');
                requirements.uppercase.querySelector('i').className = 'fas fa-times';
            }
            
            // Check lowercase letters
            if (/[a-z]/.test(password)) {
                strength += 25;
                metRequirements++;
                requirements.lowercase.classList.add('met');
                requirements.lowercase.querySelector('i').className = 'fas fa-check';
            } else {
                requirements.lowercase.classList.remove('met');
                requirements.lowercase.querySelector('i').className = 'fas fa-times';
            }
            
            // Check numbers
            if (/[0-9]/.test(password)) {
                strength += 25;
                metRequirements++;
                requirements.number.classList.add('met');
                requirements.number.querySelector('i').className = 'fas fa-check';
            } else {
                requirements.number.classList.remove('met');
                requirements.number.querySelector('i').className = 'fas fa-times';
            }
            
            // Update strength bar
            strengthBar.style.width = strength + '%';
            
            // Update strength bar color
            if (strength < 50) {
                strengthBar.style.backgroundColor = '#ef4444'; // red
            } else if (strength < 75) {
                strengthBar.style.backgroundColor = '#f59e0b'; // amber
            } else {
                strengthBar.style.backgroundColor = '#10b981'; // green
            }
        });
        
        // Confirm password validation
        document.getElementById('password-confirm').addEventListener('input', function() {
            const password = document.getElementById('password').value;
            const confirmPassword = this.value;
            
            if (confirmPassword !== '' && password !== confirmPassword) {
                this.style.borderColor = '#ef4444';
            } else {
                this.style.borderColor = '#e2e8f0';
            }
        });
    </script>
</body>
</html>