<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Cari Pengaduan - Sistem Pengaduan Siswa</title>
  <meta name="description" content="Cari dan temukan pengaduan yang telah disampaikan">
  <meta name="keywords" content="cari pengaduan, pencarian aspirasi, tracking pengaduan">
  
  <!-- Favicons -->
  <link href="{{ asset('frontend-template/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('frontend-template/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800;900&family=Jost:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('frontend-template/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend-template/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend-template/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend-template/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend-template/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('frontend-template/assets/css/main.css') }}" rel="stylesheet">

  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">

  <style>
    :root {
      --primary-blue: #1e40af;
      --secondary-blue: #3b82f6;
      --light-blue: #dbeafe;
      --accent-blue: #60a5fa;
      --dark-blue: #1e3a8a;
    }

    .search-hero {
      background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
      color: white;
      padding: 140px 0 80px;
      text-align: center;
      position: relative;
      overflow: hidden;
    }

    .search-hero::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none"><path fill="rgba(255,255,255,0.1)" d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"></path></svg>');
      background-size: cover;
      background-position: center;
    }

    .search-card {
      border: none;
      border-radius: 16px;
      box-shadow: 0 8px 32px rgba(0,0,0,0.08);
      transition: all 0.3s ease;
      margin-bottom: 30px;
      overflow: hidden;
      background: white;
    }

    .search-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 16px 48px rgba(0,0,0,0.12);
    }

    .card-header-custom {
      background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
      border-bottom: none;
      padding: 25px 30px;
      position: relative;
      overflow: hidden;
    }

    .card-header-custom::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none"><path fill="rgba(255,255,255,0.1)" d="M0,0 L100,0 L100,100 Z"></path></svg>');
      background-size: cover;
    }

    .status-badge {
      padding: 8px 16px;
      border-radius: 25px;
      font-size: 0.85rem;
      font-weight: 600;
      letter-spacing: 0.3px;
    }

    .status-pending { 
      background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
      color: #856404;
      border: 1px solid #ffeaa7;
    }

    .status-process { 
      background: linear-gradient(135deg, #cce7ff 0%, #a8d3ff 100%);
      color: #004085;
      border: 1px solid #a8d3ff;
    }

    .status-completed { 
      background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
      color: #155724;
      border: 1px solid #c3e6cb;
    }

    .photo-thumbnail {
      width: 70px;
      height: 70px;
      object-fit: cover;
      border-radius: 12px;
      transition: all 0.3s ease;
      cursor: pointer;
      border: 2px solid #e2e8f0;
    }

    .photo-thumbnail:hover {
      transform: scale(2.5);
      z-index: 1000;
      position: relative;
      box-shadow: 0 12px 32px rgba(0,0,0,0.25);
      border-color: var(--primary-blue);
    }

    .dataTables_wrapper .dataTables_filter input {
      border-radius: 12px;
      padding: 12px 20px;
      border: 2px solid #e2e8f0;
      transition: all 0.3s ease;
      font-size: 0.95rem;
    }

    .dataTables_wrapper .dataTables_filter input:focus {
      border-color: var(--primary-blue);
      box-shadow: 0 0 0 3px rgba(30, 64, 175, 0.1);
    }

    .dataTables_wrapper .dataTables_length select {
      border-radius: 12px;
      padding: 8px 16px;
      border: 2px solid #e2e8f0;
      transition: all 0.3s ease;
    }

    .dataTables_wrapper .dataTables_length select:focus {
      border-color: var(--primary-blue);
      box-shadow: 0 0 0 3px rgba(30, 64, 175, 0.1);
    }

    .table-hover tbody tr {
      transition: all 0.3s ease;
      border-bottom: 1px solid #f1f5f9;
    }

    .table-hover tbody tr:hover {
      background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
      transform: translateX(8px);
      box-shadow: 0 4px 16px rgba(0,0,0,0.08);
    }

    .filter-section {
      background: white;
      border-radius: 20px;
      padding: 30px;
      margin-bottom: 40px;
      box-shadow: 0 8px 32px rgba(0,0,0,0.08);
      border: 1px solid #f1f5f9;
    }

    .search-info {
      background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
      border-left: 6px solid var(--primary-blue);
      padding: 25px 30px;
      border-radius: 0 16px 16px 0;
      margin-bottom: 40px;
      position: relative;
      overflow: hidden;
    }

    .search-info::before {
      content: '';
      position: absolute;
      top: 0;
      right: 0;
      width: 100px;
      height: 100px;
      background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="80" cy="20" r="15" fill="rgba(59, 130, 246, 0.1)"/></svg>');
    }

    .dataTables_paginate .paginate_button {
      border-radius: 12px !important;
      margin: 0 4px;
      padding: 8px 16px !important;
      border: 1px solid #e2e8f0 !important;
      transition: all 0.3s ease !important;
    }

    .dataTables_paginate .paginate_button.current {
      background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%) !important;
      border-color: var(--primary-blue) !important;
      color: white !important;
      transform: scale(1.05);
    }

    .dataTables_paginate .paginate_button:hover {
      background: #f8fafc !important;
      border-color: var(--primary-blue) !important;
      color: var(--primary-blue) !important;
      transform: translateY(-2px);
    }

    .dt-buttons .btn {
      border-radius: 12px;
      margin-right: 8px;
      font-weight: 600;
      padding: 10px 20px;
      transition: all 0.3s ease;
      border: 2px solid transparent;
    }

    .dt-buttons .btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(0,0,0,0.15);
    }

    .table th {
      background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
      color: var(--dark-blue);
      border: none;
      padding: 20px 16px;
      font-weight: 700;
      font-size: 0.95rem;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      border-bottom: 2px solid #e2e8f0;
    }

    .table td {
      padding: 18px 16px;
      vertical-align: middle;
      border-color: #f1f5f9;
      font-size: 0.95rem;
      color: #475569;
    }

    .badge-custom {
      padding: 6px 12px;
      border-radius: 8px;
      font-weight: 600;
      font-size: 0.85rem;
    }

    .stats-card {
      background: white;
      border-radius: 16px;
      padding: 25px;
      text-align: center;
      box-shadow: 0 4px 16px rgba(0,0,0,0.08);
      border: 1px solid #f1f5f9;
      transition: all 0.3s ease;
    }

    .stats-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 32px rgba(0,0,0,0.12);
    }

    .stats-number {
      font-size: 2.5rem;
      font-weight: 800;
      background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 8px;
    }

    .form-control-custom {
      border-radius: 12px;
      padding: 12px 16px;
      border: 2px solid #e2e8f0;
      transition: all 0.3s ease;
      font-size: 0.95rem;
    }

    .form-control-custom:focus {
      border-color: var(--primary-blue);
      box-shadow: 0 0 0 3px rgba(30, 64, 175, 0.1);
      transform: translateY(-2px);
    }

    .btn-primary-custom {
      background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
      border: none;
      border-radius: 12px;
      padding: 12px 24px;
      font-weight: 600;
      transition: all 0.3s ease;
      box-shadow: 0 4px 16px rgba(30, 64, 175, 0.3);
    }

    .btn-primary-custom:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 32px rgba(30, 64, 175, 0.4);
      background: linear-gradient(135deg, var(--dark-blue) 0%, var(--primary-blue) 100%);
    }

    /* PERBAIKAN: Tata letak DataTable yang lebih baik */
    .dataTables_wrapper .dataTables_filter {
      float: right !important;
      margin-bottom: 15px;
    }

    .dataTables_wrapper .dt-buttons {
      float: left !important;
      margin-bottom: 15px;
    }

    .dataTables_wrapper .dataTables_length {
      float: left !important;
      margin-right: 20px;
    }

    .dataTables_wrapper .dataTables_info {
      float: left !important;
      padding-top: 10px;
    }

    .dataTables_wrapper .dataTables_paginate {
      float: right !important;
      padding-top: 10px;
    }

    /* PERBAIKAN: Container untuk tombol dan filter - PERBAIKAN BESAR */
    .dt-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      margin-bottom: 20px;
      gap: 15px;
      padding: 0 15px;
    }

    .dt-container .dt-buttons {
      order: 1;
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
    }

    .dt-container .dataTables_filter {
      order: 2;
      flex-grow: 1;
      max-width: 300px;
    }

    .dt-container .dataTables_length {
      order: 3;
    }

    /* PERBAIKAN: Penyesuaian untuk tombol agar lebih simetris */
    .dt-buttons .btn {
      margin-right: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      min-width: 120px;
    }

    /* PERBAIKAN: Responsif untuk mobile */
    @media (max-width: 768px) {
      .table-responsive {
        font-size: 0.875rem;
        border-radius: 12px;
      }

      .photo-thumbnail {
        width: 50px;
        height: 50px;
      }

      .dt-container {
        flex-direction: column;
        align-items: stretch;
        gap: 10px;
      }

      .dt-container .dt-buttons,
      .dt-container .dataTables_filter,
      .dt-container .dataTables_length {
        width: 100%;
        text-align: center;
        margin-bottom: 10px;
      }

      .dt-container .dt-buttons {
        justify-content: center;
      }

      .dt-container .dt-buttons .btn {
        width: auto;
        flex: 1;
        margin-bottom: 8px;
        font-size: 0.8rem;
        padding: 8px 16px;
        min-width: 100px;
      }

      .dataTables_wrapper .dataTables_info,
      .dataTables_wrapper .dataTables_paginate {
        float: none !important;
        text-align: center;
        width: 100%;
      }

      .filter-section {
        padding: 20px;
      }

      .search-info {
        padding: 20px;
      }

      .stats-card {
        padding: 20px;
        margin-bottom: 15px;
      }

      .stats-number {
        font-size: 2rem;
      }
      
      .table th, .table td {
        padding: 12px 8px;
      }
    }

    /* Loading animation */
    .table-loading {
      position: relative;
    }

    .table-loading::after {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(255,255,255,0.8);
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 100;
    }

    /* Custom scrollbar for table */
    .table-responsive::-webkit-scrollbar {
      height: 8px;
    }

    .table-responsive::-webkit-scrollbar-track {
      background: #f1f5f9;
      border-radius: 10px;
    }

    .table-responsive::-webkit-scrollbar-thumb {
      background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
      border-radius: 10px;
    }

    /* Animation for table rows */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .table tbody tr {
      animation: fadeInUp 0.5s ease-out;
    }

    .table tbody tr:nth-child(even) {
      background-color: #fafbfc;
    }

    /* PERBAIKAN: Light background untuk section */
    .light-background {
      background-color: #f8fafc;
      padding: 80px 0;
    }
    
    /* PERBAIKAN: Penyesuaian untuk card stats di hero */
    .search-hero .stats-card {
      margin-bottom: 0;
    }
    
    /* PERBAIKAN: Penyesuaian untuk header tabel */
    .card-header-custom h4 {
      margin-bottom: 0;
    }
    
    /* PERBAIKAN: Penyesuaian untuk kolom tabel */
    .table th, .table td {
      text-align: center;
    }
    
    .table th:first-child, .table td:first-child,
    .table th:nth-child(7), .table td:nth-child(7),
    .table th:last-child, .table td:last-child {
      text-align: center;
    }
    
    .table th:nth-child(2), .table td:nth-child(2),
    .table th:nth-child(3), .table td:nth-child(3),
    .table th:nth-child(4), .table td:nth-child(4),
    .table th:nth-child(5), .table td:nth-child(5),
    .table th:nth-child(6), .table td:nth-child(6),
    .table th:nth-child(8), .table td:nth-child(8) {
      text-align: left;
    }
  </style>
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
      <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename">Pengaduan Siswa</h1>
      </a>
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ url('/') }}">Beranda</a></li>
          <li><a href="{{ url('/') }}#about">Tentang</a></li>
          <li><a href="{{ url('/search') }}" class="active">search</a></li>
          <li><a href="{{ url('/profil') }}">Profil</a></li>
          <li><a href="{{ url('/') }}#lapor" class="nav-link scrollto">Lapor</a></li>
          @if (Route::has('login'))
            @auth
              <li><a class="nav-link scrollto" href="{{ url('/home') }}">Dashboard</a></li>
            @endauth
          @endif
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      @if (Route::has('login') && !auth()->check())
        <a class="btn-getstarted" href="{{ route('login') }}">Log In</a>
      @endif
    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="search-hero section">
      <div class="container">
        <div class="row justify-content-center text-center" data-aos="zoom-out">
          <div class="col-lg-8">
            <h1 class="display-3 fw-bold mb-3" style="color: white;">Cari Pengaduan & Aspirasi</h1>
            <p class="lead mb-5">Telusuri dan pantau perkembangan pengaduan yang telah disampaikan oleh siswa SMK Cinta Kasih Tzu Chi</p>
            <div class="row justify-content-center g-4">
              <div class="col-md-3 col-6">
                <div class="stats-card">
                  <div class="stats-number">{{ $inputaspirasis->count() }}</div>
                  <p class="text-muted mb-0 fw-semibold">Total Aspirasi</p>
                </div>
              </div>
              <div class="col-md-3 col-6">
                <div class="stats-card">
                  <div class="stats-number">{{ $inputaspirasis->where('latestAspirasi.status', 'Selesai')->count() }}</div>
                  <p class="text-muted mb-0 fw-semibold">Selesai</p>
                </div>
              </div>
              <div class="col-md-3 col-6">
                <div class="stats-card">
                  <div class="stats-number">{{ $inputaspirasis->where('latestAspirasi.status', 'Proses')->count() }}</div>
                  <p class="text-muted mb-0 fw-semibold">Diproses</p>
                </div>
              </div>
              <div class="col-md-3 col-6">
                <div class="stats-card">
                  <div class="stats-number">{{ $inputaspirasis->where('latestAspirasi.status', 'Menunggu')->count() }}</div>
                  <p class="text-muted mb-0 fw-semibold">Menunggu</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Search Section -->
    <section id="search" class="section">
      <div class="container">
        
        <!-- Section Title -->
        <div class="container section-title text-center" data-aos="fade-up">
          <h2 class="mb-3">Pencarian Data Pengaduan</h2>
          <p class="lead">Gunakan fitur pencarian dan filter untuk menemukan pengaduan yang Anda cari dengan mudah</p>
        </div>

        <!-- Filter Section -->
        <div class="filter-section" data-aos="fade-up" data-aos-delay="100">
          <div class="row g-4 align-items-end">
            <div class="col-lg-3 col-md-6">
              <label class="form-label fw-semibold text-dark mb-3"><i class="bi bi-funnel me-2 text-primary"></i>Status Pengaduan</label>
              <select class="form-control form-control-custom" id="statusFilter">
                <option value="">Semua Status</option>
                <option value="Menunggu">Menunggu</option>
                <option value="Proses">Diproses</option>
                <option value="Selesai">Selesai</option>
              </select>
            </div>
            <div class="col-lg-3 col-md-6">
              <label class="form-label fw-semibold text-dark mb-3"><i class="bi bi-calendar me-2 text-primary"></i>Tanggal Mulai</label>
              <input type="date" class="form-control form-control-custom" id="startDate">
            </div>
            <div class="col-lg-3 col-md-6">
              <label class="form-label fw-semibold text-dark mb-3"><i class="bi bi-calendar me-2 text-primary"></i>Tanggal Akhir</label>
              <input type="date" class="form-control form-control-custom" id="endDate">
            </div>
            <div class="col-lg-3 col-md-6">
              <button class="btn btn-primary-custom w-100" id="applyFilter">
                <i class="bi bi-funnel me-2"></i>Terapkan Filter
              </button>
            </div>
          </div>
        </div>
        
        <!-- Search Info -->
        <div class="search-info" data-aos="fade-up" data-aos-delay="150">
          <div class="row align-items-center">
            <div class="col-lg-8">
              <h5 class="mb-3 text-dark"><i class="bi bi-info-circle me-2 text-primary"></i>Panduan Pencarian</h5>
              <p class="mb-0 text-dark">Gunakan kolom pencarian di tabel untuk mencari berdasarkan NIS, nama siswa, kategori, lokasi, atau keterangan. Anda juga dapat menggunakan filter di atas untuk menyaring hasil berdasarkan status dan tanggal.</p>
            </div>
            <div class="col-lg-4 text-lg-end text-center mt-3 mt-lg-0">
              <div class="bg-white rounded p-4 shadow-sm d-inline-block">
                <h4 class="text-primary mb-2 fw-bold">{{ $inputaspirasis->count() }}</h4>
                <p class="text-muted mb-0 fw-semibold">Total Aspirasi Tersimpan</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Results Table -->
        <div class="search-card" data-aos="fade-up" data-aos-delay="200">
          <div class="card-header-custom">
            <div class="row align-items-center">
              <div class="col-lg-6">
                <h4 class="mb-0 text-white fw-bold"><i class="bi bi-table me-3"></i>Daftar Aspirasi & Pengaduan</h4>
              </div>
              <div class="col-lg-6 text-lg-end text-center mt-3 mt-lg-0">
                <div class="text-white-50 fw-semibold">
                  <i class="bi bi-info-circle me-2"></i> 
                  <span id="filterInfo">Menampilkan semua data</span>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body p-4">
            <!-- PERBAIKAN: Container untuk tombol dan filter DataTable -->
            <div class="dt-container">
              <div class="dt-buttons"></div>
              <div class="dataTables_filter"></div>
              <div class="dataTables_length"></div>
            </div>
            
            <div class="table-responsive">
              <table id="aspirasiTable" class="table table-hover mb-0" style="width:100%">
                <thead class="table-light">
                  <tr>
                    <th width="5%" class="text-center">No</th>
                    <th width="10%">NIS</th>
                    <th width="12%">Siswa</th>
                    <th width="12%">Kategori</th>
                    <th width="12%">Lokasi</th>
                    <th width="18%">Keterangan</th>
                    <th width="8%" class="text-center">Foto</th>
                    <th width="10%">Tanggal</th>
                    <th width="13%" class="text-center">Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($inputaspirasis as $key => $aspirasi)
                  @php
                      $latestAspirasi = $aspirasi->latestAspirasi;
                      $status = $latestAspirasi ? $latestAspirasi->status : 'Menunggu';
                  @endphp
                  <tr>
                    <td class="text-center fw-bold text-dark">{{ $key + 1 }}</td>
                    <td>
                      <span class="badge badge-custom bg-light text-dark border">{{ $aspirasi->nis }}</span>
                    </td>
                    <td class="fw-semibold text-dark">{{ $aspirasi->siswa->nama ?? 'N/A' }}</td>
                    <td>
                      <span class="badge badge-custom bg-primary text-white">{{ $aspirasi->kategori->nama_kategori ?? 'Umum' }}</span>
                    </td>
                    <td class="text-dark">{{ $aspirasi->lokasi }}</td>
                    <td>
                      <span data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $aspirasi->keterangan }}" class="text-dark">
                        {{ \Illuminate\Support\Str::limit($aspirasi->keterangan, 50) }}
                      </span>
                    </td>
                    <td class="text-center">
                      @if($aspirasi->foto)
                          <a href="{{ asset('foto/' . $aspirasi->foto) }}" target="_blank" data-bs-toggle="tooltip" title="Klik untuk melihat foto lengkap">
                            <img src="{{ asset('foto/' . $aspirasi->foto) }}" class="photo-thumbnail" alt="Foto Aspirasi">
                          </a>
                      @else
                          <span class="text-muted small fst-italic">Tidak ada foto</span>
                      @endif
                    </td>
                    <td>
                      <span class="badge badge-custom bg-light text-dark border">
                        {{ $aspirasi->created_at->format('d/m/Y') }}
                      </span>
                    </td>
                    <td class="text-center">
                      @if($status == 'Selesai')
                        <span class="status-badge status-completed">
                          <i class="bi bi-check-circle me-2"></i>Selesai
                        </span>
                      @elseif($status == 'Proses')
                        <span class="status-badge status-process">
                          <i class="bi bi-arrow-repeat me-2"></i>Diproses
                        </span>
                      @else
                        <span class="status-badge status-pending">
                          <i class="bi bi-clock me-2"></i>Menunggu
                        </span>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- How to Search Section -->
    <section id="how-to-search" class="section light-background">
      <div class="container">
        <div class="container section-title text-center" data-aos="fade-up">
          <h2 class="mb-3">Cara Mencari Pengaduan</h2>
          <p class="lead">Panduan lengkap untuk menemukan pengaduan yang Anda butuhkan dengan mudah</p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="search-card h-100 text-center">
              <div class="card-body p-4">
                <div class="feature-icon mb-4">
                  <i class="bi bi-123 display-4 text-primary"></i>
                </div>
                <h5 class="mb-3 text-dark">Cari dengan NIS</h5>
                <p class="text-muted mb-0">Masukkan Nomor Induk Siswa untuk melihat semua pengaduan yang pernah disampaikan oleh siswa tertentu.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="search-card h-100 text-center">
              <div class="card-body p-4">
                <div class="feature-icon mb-4">
                  <i class="bi bi-tags display-4 text-primary"></i>
                </div>
                <h5 class="mb-3 text-dark">Cari dengan Kategori</h5>
                <p class="text-muted mb-0">Gunakan kata kunci kategori seperti "akademik", "fasilitas", atau "sosial" untuk menemukan pengaduan terkait.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="search-card h-100 text-center">
              <div class="card-body p-4">
                <div class="feature-icon mb-4">
                  <i class="bi bi-filter display-4 text-primary"></i>
                </div>
                <h5 class="mb-3 text-dark">Filter Status & Tanggal</h5>
                <p class="text-muted mb-0">Gunakan filter status dan rentang tanggal untuk melihat pengaduan berdasarkan tahap penanganan dan periode waktu.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>

  <footer id="footer" class="footer">
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="{{ url('/') }}" class="d-flex align-items-center">
            <span class="sitename">Sistem Pengaduan Siswa</span>
          </a>
          <div class="footer-contact pt-3">
            <p>SMK Cinta Kasih Tzu Chi</p>
            <p>Jl. Raya Cilandak KKO No.1, Jakarta Selatan</p>
            <p class="mt-3"><strong>Telepon:</strong> <span>(021) 123-4567</span></p>
            <p><strong>Email:</strong> <span>pengaduan@smkcktzuchi.sch.id</span></p>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Tautan Cepat</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ url('/') }}">Beranda</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ url('/') }}#about">Tentang</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ url('/profil') }}">Profil</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ url('/') }}#lapor">Lapor</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Dukungan</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ url('/') }}#faq-2">FAQ</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Panduan</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Bantuan</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Kontak</a></li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-12">
          <h4>Ikuti Kami</h4>
          <p>Terhubung dengan kami melalui media sosial untuk mendapatkan informasi terbaru</p>
          <div class="social-links d-flex">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-youtube"></i></a>
          </div>
        </div>
      </div>
    </div>
    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Sistem Pengaduan Siswa</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('frontend-template/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('frontend-template/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('frontend-template/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('frontend-template/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('frontend-template/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('frontend-template/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('frontend-template/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('frontend-template/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('frontend-template/assets/js/main.js') }}"></script>

  <!-- DataTables Scripts -->
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

  <script>
    $(document).ready(function () {
      // Inisialisasi DataTable dengan tombol ekspor
      var table = $('#aspirasiTable').DataTable({
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json"
        },
        "responsive": true,
        "order": [[7, 'desc']],
        "dom": '<"dt-container"<"dt-buttons"B><"dataTables_filter"f><"dataTables_length"l>><"row"<"col-sm-12"tr>><"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        "pageLength": 10,
        "buttons": [
          {
            extend: 'excel',
            text: '<i class="bi bi-file-earmark-excel me-2"></i>Excel',
            className: 'btn btn-success btn-sm',
            title: 'Data Aspirasi Siswa - SMK Cinta Kasih Tzu Chi',
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5, 7, 8],
              format: {
                body: function (data, row, column, node) {
                  // PERBAIKAN: Ekstrak teks dari elemen span untuk status
                  if (column === 8) {
                    return $(data).text().trim();
                  }
                  // PERBAIKAN: Ekstrak teks dari elemen span untuk NIS
                  if (column === 1) {
                    return $(data).text().trim();
                  }
                  // PERBAIKAN: Ekstrak teks dari elemen span untuk kategori
                  if (column === 3) {
                    return $(data).text().trim();
                  }
                  // PERBAIKAN: Ekstrak teks dari elemen span untuk tanggal
                  if (column === 7) {
                    return $(data).text().trim();
                  }
                  // PERBAIKAN: Ekstrak teks lengkap untuk keterangan
                  if (column === 5) {
                    return $(data).attr('title') || data;
                  }
                  return data;
                }
              }
            },
            customize: function(xlsx) {
              var sheet = xlsx.xl.worksheets['sheet1.xml'];
              $('row c[r^="H"]', sheet).attr('s', '2'); // Format tanggal
            }
          },
          {
            extend: 'pdf',
            text: '<i class="bi bi-file-earmark-pdf me-2"></i>PDF',
            className: 'btn btn-danger btn-sm',
            title: 'Data Aspirasi Siswa - SMK Cinta Kasih Tzu Chi',
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5, 7, 8],
              format: {
                body: function (data, row, column, node) {
                  // PERBAIKAN: Ekstrak teks dari elemen span untuk status
                  if (column === 8) {
                    return $(data).text().trim();
                  }
                  // PERBAIKAN: Ekstrak teks dari elemen span untuk NIS
                  if (column === 1) {
                    return $(data).text().trim();
                  }
                  // PERBAIKAN: Ekstrak teks dari elemen span untuk kategori
                  if (column === 3) {
                    return $(data).text().trim();
                  }
                  // PERBAIKAN: Ekstrak teks dari elemen span untuk tanggal
                  if (column === 7) {
                    return $(data).text().trim();
                  }
                  // PERBAIKAN: Ekstrak teks lengkap untuk keterangan
                  if (column === 5) {
                    return $(data).attr('title') || data;
                  }
                  return data;
                }
              }
            },
            customize: function (doc) {
              doc.content[1].table.widths = 
                ['5%', '10%', '15%', '12%', '13%', '25%', '10%', '10%'];
              doc.styles.tableHeader.fillColor = '#1e40af';
              doc.styles.tableHeader.color = 'white';
              doc.styles.tableHeader.alignment = 'center';
              doc.defaultStyle.alignment = 'left';
              doc.styles.tableBodyEven.alignment = 'left';
              doc.styles.tableBodyOdd.alignment = 'left';
              
              // PERBAIKAN: Tambahkan header dan footer yang lebih baik
              doc.header = function(currentPage, pageCount, pageSize) {
                return [
                  { 
                    text: 'Data Aspirasi Siswa - SMK Cinta Kasih Tzu Chi', 
                    alignment: 'center', 
                    fontSize: 16, 
                    bold: true,
                    margin: [0, 10, 0, 0]
                  }
                ];
              };
              
              doc.footer = function(currentPage, pageCount) {
                return {
                  text: 'Halaman ' + currentPage.toString() + ' dari ' + pageCount,
                  alignment: 'center',
                  margin: [0, 10, 0, 0]
                };
              };
            }
          },
          {
            extend: 'print',
            text: '<i class="bi bi-printer me-2"></i>Print',
            className: 'btn btn-info btn-sm',
            title: 'Data Aspirasi Siswa - SMK Cinta Kasih Tzu Chi',
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5, 7, 8],
              format: {
                body: function (data, row, column, node) {
                  // PERBAIKAN: Ekstrak teks dari elemen span untuk status
                  if (column === 8) {
                    return $(data).text().trim();
                  }
                  // PERBAIKAN: Ekstrak teks dari elemen span untuk NIS
                  if (column === 1) {
                    return $(data).text().trim();
                  }
                  // PERBAIKAN: Ekstrak teks dari elemen span untuk kategori
                  if (column === 3) {
                    return $(data).text().trim();
                  }
                  // PERBAIKAN: Ekstrak teks dari elemen span untuk tanggal
                  if (column === 7) {
                    return $(data).text().trim();
                  }
                  // PERBAIKAN: Ekstrak teks lengkap untuk keterangan
                  if (column === 5) {
                    return $(data).attr('title') || data;
                  }
                  return data;
                }
              }
            },
            customize: function (win) {
              $(win.document.body)
                .css('font-size', '10pt')
                .prepend(
                  '<div style="text-align: center; margin-bottom: 20px;">' +
                  
                  '<p>Dicetak pada: ' + new Date().toLocaleDateString('id-ID') + '</p>' +
                  '</div>'
                );
              
              $(win.document.body).find('table')
                .addClass('compact')
                .css('font-size', 'inherit');
                
              $(win.document.body).find('h1').css('text-align', 'center');
            }
          }
        ],
        "drawCallback": function(settings) {
          var total = this.api().data().length;
          var filtered = this.api().rows({ filter: 'applied' }).count();
          
          if (total === filtered) {
            $('#filterInfo').text('Menampilkan semua data (' + total + ' aspirasi)');
          } else {
            $('#filterInfo').text('Menampilkan ' + filtered + ' dari ' + total + ' aspirasi');
          }
          
          var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
          var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
          });
        }
      });

      // PERBAIKAN: Pindahkan tombol ke container yang tepat
      table.buttons().container().appendTo('.dt-buttons');
      
      $('#statusFilter').change(function() {
        var status = $(this).val();
        if (status === '') {
          table.columns(8).search('').draw();
        } else {
          table.columns(8).search('^' + status + '$', true, false).draw();
        }
      });
      
      $('#applyFilter').click(function() {
        var startDate = $('#startDate').val();
        var endDate = $('#endDate').val();
        
        if (startDate || endDate) {
          $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
              var dateText = data[7];
              var dateParts = dateText.split('/');
              var date = new Date(dateParts[2], dateParts[1] - 1, dateParts[0]);
              
              var start = startDate ? new Date(startDate) : null;
              var end = endDate ? new Date(endDate) : null;
              
              if ((start === null && end === null) ||
                  (start === null && date <= end) ||
                  (start <= date && end === null) ||
                  (start <= date && date <= end)) {
                return true;
              }
              return false;
            }
          );
          table.draw();
          $.fn.dataTable.ext.search.pop();
        } else {
          table.draw();
        }
      });

      $('#startDate, #endDate').on('change', function() {
        if (!$(this).val()) {
          table.draw();
        }
      });
    });
  </script>

</body>
</html>