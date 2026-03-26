<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Sistem Pengaduan Siswa</title>
  <meta name="description" content="Sistem pengaduan online untuk siswa menyampaikan aspirasi dan keluhan">
  <meta name="keywords" content="pengaduan siswa, aspirasi siswa, keluhan sekolah">
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

  <!-- =======================================================
  * Template Name: Arsha
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Updated: Feb 22 2025 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
  <div class="container-fluid container-xl position-relative d-flex align-items-center">

    <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto">
      <h1 class="sitename">Pengaduan Siswa</h1>
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="#hero" class="active">Beranda</a></li>
        <li><a href="#about">Tentang</a></li>
        <li><a href="search">search</a></li>
        <li><a href="profil">profil</a></li>
        <!-- Di dalam <nav id="navmenu" class="navmenu">, tambahkan: -->
<li><a href="#lapor" class="nav-link scrollto">Lapor</a></li>

        <!-- Dropdown utama untuk menu lainnya
        <li class="dropdown">
          <a href="#"><span>Menu</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="#services">Services</a></li>
            <li><a href="#portfolio">Portfolio</a></li>
            <li><a href="#team">Team</a></li>
            <li><a href="#pricing">Pricing</a></li>
            <li><a href="blog.html">Blog</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#lapor">Lapor</a></li>
          </ul>
        </li> -->

        {{-- Bagian autentikasi login/register --}}
        @if (Route::has('login'))
            @auth
                <li><a class="nav-link scrollto" href="{{ url('/home') }}">Dashboard</a></li>
            @else
            @endauth
        @endif
      </ul>

      <!-- Toggle untuk mobile -->
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

    <!-- Tombol login menggantikan Get Started, hanya muncul kalau belum login -->
    @if (Route::has('login') && !auth()->check())
      <a class="btn-getstarted" href="{{ route('login') }}">Log In</a>
    @endif

    <!-- Tombol login menggantikan Get Started, hanya muncul kalau belum login
    @if (Route::has('register') && !auth()->check())
      <a class="btn-getstarted" href="{{ route('register') }}">Register</a>
    @endif -->

  </div>
</header>





  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
            <h1>Suara Anda Penting Bagi Kami</h1>
            <p>Sistem pengaduan online untuk siswa menyampaikan aspirasi, keluhan, dan saran demi lingkungan sekolah yang lebih baik</p>
            <div class="d-flex">
              <a href="#lapor" class="btn-get-started">Ajukan Pengaduan</a>
              <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Tonton Panduan</span></a>
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
            <img src="{{ asset('frontend-template/assets/img/hero-img.png') }}" class="img-fluid animated" alt="Hero Image">
        </div>

        </div>
      </div>

    </section><!-- /Hero Section -->

    

    <!-- Clients Section -->
    <section id="clients" class="clients section light-background">

      <div class="container" data-aos="zoom-in">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "spaceBetween": 40
                },
                "480": {
                  "slidesPerView": 3,
                  "spaceBetween": 60
                },
                "640": {
                  "slidesPerView": 4,
                  "spaceBetween": 80
                },
                "992": {
                  "slidesPerView": 5,
                  "spaceBetween": 120
                },
                "1200": {
                  "slidesPerView": 6,
                  "spaceBetween": 120
                }
              }
            }
          </script>
          <div class="swiper-wrapper align-items-center">
  <div class="swiper-slide">
    <img src="{{ asset('frontend-template/assets/img/clients/clients-1.webp') }}" class="img-fluid" alt="Client 1">
  </div>
  <div class="swiper-slide">
    <img src="{{ asset('frontend-template/assets/img/clients/clients-2.webp') }}" class="img-fluid" alt="Client 2">
  </div>
  <div class="swiper-slide">
    <img src="{{ asset('frontend-template/assets/img/clients/clients-3.webp') }}" class="img-fluid" alt="Client 3">
  </div>
  <div class="swiper-slide">
    <img src="{{ asset('frontend-template/assets/img/clients/clients-4.webp') }}" class="img-fluid" alt="Client 4">
  </div>
  <div class="swiper-slide">
    <img src="{{ asset('frontend-template/assets/img/clients/clients-5.webp') }}" class="img-fluid" alt="Client 5">
  </div>
  <div class="swiper-slide">
    <img src="{{ asset('frontend-template/assets/img/clients/clients-6.webp') }}" class="img-fluid" alt="Client 6">
  </div>
  <div class="swiper-slide">
    <img src="{{ asset('frontend-template/assets/img/clients/clients-7.webp') }}" class="img-fluid" alt="Client 7">
  </div>
  <div class="swiper-slide">
    <img src="{{ asset('frontend-template/assets/img/clients/clients-8.webp') }}" class="img-fluid" alt="Client 8">
  </div>
</div>

        </div>

      </div>

    </section><!-- /Clients Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Tentang Sistem Pengaduan</h2>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <p>
              Sistem Pengaduan Siswa adalah platform digital yang memungkinkan siswa untuk menyampaikan aspirasi, keluhan, dan saran secara aman, terstruktur, dan transparan.
            </p>
            <ul>
              <li><i class="bi bi-check2-circle"></i> <span>Menyediakan saluran komunikasi resmi antara siswa dan pihak sekolah</span></li>
              <li><i class="bi bi-check2-circle"></i> <span>Menjamin kerahasiaan identitas siswa yang melaporkan</span></li>
              <li><i class="bi bi-check2-circle"></i> <span>Memastikan setiap laporan ditindaklanjuti dengan tepat waktu</span></li>
            </ul>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <p>Dengan sistem ini, kami berkomitmen untuk menciptakan lingkungan sekolah yang lebih baik, responsif terhadap kebutuhan siswa, dan mendorong partisipasi aktif seluruh warga sekolah dalam membangun komunitas pendidikan yang sehat dan positif.</p>
            <a href="#" class="read-more"><span>Pelajari Lebih Lanjut</span><i class="bi bi-arrow-right"></i></a>
          </div>

        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Why Us Section -->
    <section id="why-us" class="section why-us light-background" data-builder="section">

      <div class="container-fluid">

        <div class="row gy-4">

          <div class="col-lg-7 d-flex flex-column justify-content-center order-2 order-lg-1">

            <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100">
              <h3><span>Mengapa Menggunakan </span><strong>Sistem Pengaduan Siswa?</strong></h3>
              <p>
                Sistem ini dirancang khusus untuk memudahkan siswa menyampaikan berbagai masalah yang dihadapi di lingkungan sekolah dengan proses yang jelas dan terjamin keamanannya.
              </p>
            </div>

            <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">

              <div class="faq-item faq-active">

                <h3><span>01</span> Apakah identitas saya akan dirahasiakan?</h3>
                <div class="faq-content">
                  <p>Ya, sistem kami menjamin kerahasiaan identitas Anda. Hanya pihak yang berwenang yang dapat mengakses informasi pribadi Anda, dan itu hanya untuk keperluan verifikasi dan tindak lanjut.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3><span>02</span> Berapa lama waktu yang dibutuhkan untuk mendapatkan tanggapan?</h3>
                <div class="faq-content">
                  <p>Kami berkomitmen untuk merespons setiap laporan dalam waktu maksimal 3-5 hari kerja. Laporan yang mendesak akan diprioritaskan dan ditangani lebih cepat.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3><span>03</span> Jenis masalah apa saja yang bisa saya laporkan?</h3>
                <div class="faq-content">
                  <p>Anda dapat melaporkan berbagai masalah termasuk fasilitas sekolah yang rusak, masalah dengan guru atau staf, perundungan, masalah akademik, dan saran perbaikan untuk sekolah.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

            </div>

          </div>

          <div class="col-lg-5 order-1 order-lg-2 why-us-img">
  <img src="{{ asset('frontend-template/assets/img/why-us.png') }}" 
       class="img-fluid" 
       alt="Mengapa Menggunakan Sistem Pengaduan" 
       data-aos="zoom-in" 
       data-aos-delay="100">
</div>

        </div>

      </div>

    </section><!-- /Why Us Section -->

    <!-- Skills Section -->
    <section id="skills" class="skills section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">

          <div class="col-lg-6 d-flex align-items-center">
  <img src="{{ asset('frontend-template/assets/img/illustration/illustration-10.webp') }}" class="img-fluid" alt="">
</div>


          <div class="col-lg-6 pt-4 pt-lg-0 content">

            <h3>Statistik Respons Pengaduan</h3>
            <p class="fst-italic">
              Berikut adalah data respons pengaduan siswa dalam 6 bulan terakhir yang menunjukkan komitmen kami dalam menangani setiap laporan.
            </p>

            <div class="skills-content skills-animation">

              <div class="progress">
                <span class="skill"><span>Pengaduan Diterima</span> <i class="val">100%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div><!-- End Skills Item -->

              <div class="progress">
                <span class="skill"><span>Pengaduan Ditanggapi</span> <i class="val">95%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div><!-- End Skills Item -->

              <div class="progress">
                <span class="skill"><span>Pengaduan Terselesaikan</span> <i class="val">88%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div><!-- End Skills Item -->

              <div class="progress">
                <span class="skill"><span>Kepuasan Siswa</span> <i class="val">92%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div><!-- End Skills Item -->

            </div>

          </div>
        </div>

      </div>

    </section><!-- /Skills Section -->

    <!-- Services Section -->
    <section id="services" class="services section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Jenis Pengaduan</h2>
        <p>Berbagai kategori pengaduan yang dapat disampaikan melalui sistem ini</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-book icon"></i></div>
              <h4><a href="" class="stretched-link">Akademik</a></h4>
              <p>Masalah terkait pembelajaran, kurikulum, penilaian, dan fasilitas belajar</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-building icon"></i></div>
              <h4><a href="" class="stretched-link">Fasilitas Sekolah</a></h4>
              <p>Keluhan tentang sarana dan prasarana sekolah yang perlu perbaikan</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-people icon"></i></div>
              <h4><a href="" class="stretched-link">Sosial & Perilaku</a></h4>
              <p>Laporan tentang perundungan, diskriminasi, atau masalah hubungan sosial</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-lightbulb icon"></i></div>
              <h4><a href="" class="stretched-link">Aspirasi & Saran</a></h4>
              <p>Usulan dan ide untuk perbaikan dan pengembangan sekolah</p>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Services Section -->

    <!-- Work Process Section -->
    <section id="work-process" class="work-process section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Proses Pengaduan</h2>
        <p>Langkah-langkah mudah dalam menyampaikan pengaduan melalui sistem kami</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-5">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="steps-item">
              <div class="steps-image">
  <img src="{{ asset('frontend-template/assets/img/steps/steps-1.webp') }}" alt="Step 1" class="img-fluid" loading="lazy">
</div>

              <div class="steps-content">
                <div class="steps-number">01</div>
                <h3>Isi Form Pengaduan</h3>
                <p>Lengkapi form pengaduan dengan data yang akurat dan jelas, termasuk kategori masalah, lokasi, dan deskripsi lengkap.</p>
                <div class="steps-features">
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Masukkan NIS</span>
                  </div>
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Pilih Kategori</span>
                  </div>
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Lampirkan Bukti</span>
                  </div>
                </div>
              </div>
            </div><!-- End Steps Item -->
          </div>

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="steps-item">
              <div class="steps-image" data-aos="fade-up" data-aos-delay="150">
  <img src="{{ asset('frontend-template/assets/img/steps/steps-2.webp') }}" alt="Step 2" class="img-fluid rounded shadow" loading="lazy">
</div>

              <div class="steps-content">
                <div class="steps-number">02</div>
                <h3>Verifikasi & Penanganan</h3>
                <p>Tim kami akan memverifikasi laporan dan menyalurkannya kepada pihak yang berwenang untuk ditindaklanjuti.</p>
                <div class="steps-features">
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Verifikasi Data</span>
                  </div>
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Klasifikasi Masalah</span>
                  </div>
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Penanganan Tepat</span>
                  </div>
                </div>
              </div>
            </div><!-- End Steps Item -->
          </div>

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
            <div class="steps-item">
              <div class="steps-image" data-aos="fade-up" data-aos-delay="200">
  <img src="{{ asset('frontend-template/assets/img/steps/steps-3.webp') }}" alt="Step 3" class="img-fluid rounded shadow" loading="lazy">
</div>

              <div class="steps-content">
                <div class="steps-number">03</div>
                <h3>Tindak Lanjut & Solusi</h3>
                <p>Anda akan mendapatkan pembaruan status dan solusi yang diterapkan untuk masalah yang Anda laporkan.</p>
                <div class="steps-features">
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Update Status</span>
                  </div>
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Implementasi Solusi</span>
                  </div>
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Konfirmasi Penyelesaian</span>
                  </div>
                </div>
              </div>
            </div><!-- End Steps Item -->
          </div>

        </div>

      </div>

    </section><!-- /Work Process Section -->


    

    

    <!-- Faq 2 Section -->
    <section id="faq-2" class="faq-2 section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Pertanyaan yang Sering Diajukan</h2>
        <p>Berikut adalah beberapa pertanyaan umum seputar sistem pengaduan siswa. Jika pertanyaan Anda tidak terjawab di sini, jangan ragu untuk menghubungi kami.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row justify-content-center">

          <div class="col-lg-10">

            <div class="faq-container">

              <div class="faq-item faq-active" data-aos="fade-up" data-aos-delay="200">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Apakah saya bisa melaporkan masalah secara anonim?</h3>
                <div class="faq-content">
                  <p>Sistem kami memerlukan NIS untuk verifikasi, namun identitas Anda akan dirahasiakan. Hanya pihak berwenang yang dapat mengakses informasi pribadi, dan itu hanya untuk keperluan penanganan laporan.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Bagaimana cara mengetahui status laporan saya?</h3>
                <div class="faq-content">
                  <p>Anda dapat memantau status laporan melalui dashboard pribadi setelah login. Sistem juga akan mengirimkan notifikasi email ketika ada pembaruan status pada laporan Anda.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Apakah ada batasan jenis masalah yang bisa dilaporkan?</h3>
                <div class="faq-content">
                  <p>Anda dapat melaporkan berbagai masalah yang terkait dengan lingkungan sekolah, termasuk masalah akademik, fasilitas, hubungan sosial, dan saran perbaikan. Untuk keadaan darurat, segera hubungi guru atau staf sekolah.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item" data-aos="fade-up" data-aos-delay="500">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Bagaimana jika laporan saya tidak ditanggapi?</h3>
                <div class="faq-content">
                  <p>Kami berkomitmen menanggapi semua laporan dalam waktu 3-5 hari kerja. Jika laporan Anda belum ditanggapi setelah waktu tersebut, silakan hubungi administrator sistem melalui kontak yang tersedia.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item" data-aos="fade-up" data-aos-delay="600">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Apakah saya bisa melaporkan masalah untuk teman?</h3>
                <div class="faq-content">
                  <p>Anda dapat melaporkan masalah yang dialami teman dengan persetujuan mereka. Namun, untuk masalah serius seperti perundungan, kami menyarankan korban untuk melaporkan langsung atau dengan pendampingan guru/konselor.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

            </div>

          </div>

        </div>

      </div>

    </section><!-- /Faq 2 Section -->
    
    <!-- Lapor Section -->
<section id="lapor" class="lapor section light-background">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Input Aspirasi/Pengaduan</h2>
    <p>Silakan sampaikan aspirasi atau pengaduan Anda melalui form berikut</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row justify-content-center">
      <div class="col-lg-8">
        
        <!-- Alert Messages dengan design yang lebih baik -->
        @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show custom-alert" role="alert" id="successAlert">
            <div class="d-flex align-items-center">
              <div class="alert-icon">
                <i class="fas fa-check-circle"></i>
              </div>
              <div class="alert-content flex-grow-1">
                <h6 class="alert-title">Berhasil!</h6>
                <p class="alert-message mb-0">{{ session('success') }}</p>
              </div>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="alert-progress">
              <div class="alert-progress-bar"></div>
            </div>
          </div>
        @endif

        @if(session('error'))
          <div class="alert alert-danger alert-dismissible fade show custom-alert" role="alert" id="errorAlert">
            <div class="d-flex align-items-center">
              <div class="alert-icon">
                <i class="fas fa-exclamation-circle"></i>
              </div>
              <div class="alert-content flex-grow-1">
                <h6 class="alert-title">Terjadi Kesalahan!</h6>
                <p class="alert-message mb-0">{{ session('error') }}</p>
              </div>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="alert-progress">
              <div class="alert-progress-bar"></div>
            </div>
          </div>
        @endif

        @if($errors->any())
          <div class="alert alert-warning alert-dismissible fade show custom-alert" role="alert">
            <div class="d-flex align-items-center">
              <div class="alert-icon">
                <i class="fas fa-exclamation-triangle"></i>
              </div>
              <div class="alert-content flex-grow-1">
                <h6 class="alert-title">Perhatian!</h6>
                <ul class="alert-message mb-0 ps-3">
                  @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="alert-progress">
              <div class="alert-progress-bar"></div>
            </div>
          </div>
        @endif

        <!-- Form Input Aspirasi -->
        <form action="{{ route('inputaspirasi.store') }}" method="POST" enctype="multipart/form-data" data-aos="fade-up" data-aos-delay="100" id="aspirasiForm">
          @csrf
          
          <div class="row gy-4">

            <!-- NIS -->
            <div class="col-md-12">
              <label for="nis" class="form-label">NIS <span class="text-danger">*</span></label>
              <input type="number" class="form-control" name="nis" id="nis" value="{{ old('nis') }}" 
                     required min="1" placeholder="Masukkan NIS (hanya angka)">
              <div class="form-text">Masukkan Nomor Induk Siswa Anda (hanya angka)</div>
            </div>

            <!-- Kategori -->
            <div class="col-md-12">
              <label for="kategori_id" class="form-label">Kategori Pengaduan <span class="text-danger">*</span></label>
              <select class="form-select" name="kategori_id" id="kategori_id" required>
                <option value="">Pilih Kategori</option>
                @foreach($kategoris as $kategori)
                  <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                    {{ $kategori->keterangan }}
                  </option>
                @endforeach
              </select>
              @if($kategoris->isEmpty())
                <div class="form-text text-warning">
                  <i class="fas fa-exclamation-triangle"></i> Data kategori belum tersedia. Silakan hubungi admin.
                </div>
              @endif
            </div>

            <!-- Lokasi -->
            <div class="col-md-12">
              <label for="lokasi" class="form-label">Lokasi <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="lokasi" id="lokasi" value="{{ old('lokasi') }}" 
                     required maxlength="50" placeholder="Contoh: Ruang Kelas X-A, Lapangan Basket">
              <div class="form-text">Maksimal 50 karakter</div>
            </div>

            <!-- Keterangan -->
            <div class="col-md-12">
              <label for="keterangan" class="form-label">Keterangan <span class="text-danger">*</span></label>
              <textarea class="form-control" name="keterangan" id="keterangan" rows="5" 
                        required maxlength="255" placeholder="Jelaskan secara detail aspirasi atau pengaduan Anda">{{ old('keterangan') }}</textarea>
              <div class="form-text">Maksimal 255 karakter</div>
            </div>

            <!-- Foto -->
            <div class="col-md-12">
              <label for="foto" class="form-label">Foto Bukti <span class="text-danger">*</span></label>
              <input type="file" class="form-control" name="foto" id="foto" 
                     accept="image/jpeg,image/png,image/jpg,image/gif" required>
              <div class="form-text">Format: JPG, PNG, JPEG, GIF (maksimal 2MB)</div>
            </div>

            <!-- Submit Button -->
            <div class="col-md-12 text-center">
              <button type="submit" class="btn btn-primary btn-lg" id="submitBtn">
                <i class="fas fa-paper-plane me-2"></i>Kirim Pengaduan
              </button>
            </div>

          </div>
        </form>

      </div>
    </div>

  </div>

</section><!-- /Lapor Section -->

<style>
.custom-alert {
  border: none;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  padding: 1rem 1.25rem;
  position: relative;
  overflow: hidden;
  margin-bottom: 1.5rem;
}

.alert-icon {
  font-size: 1.5rem;
  margin-right: 0.75rem;
  display: flex;
  align-items: center;
}

.alert-content {
  padding-right: 2rem;
}

.alert-title {
  font-weight: 600;
  margin-bottom: 0.25rem;
  font-size: 1rem;
}

.alert-message {
  font-size: 0.9rem;
  line-height: 1.4;
}

.alert-progress {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 3px;
  background: rgba(0,0,0,0.1);
}

.alert-progress-bar {
  height: 100%;
  width: 100%;
  background: currentColor;
  opacity: 0.3;
  animation: progressBar 5s linear forwards;
}

.alert-success {
  background: linear-gradient(135deg, #d4edda, #c3e6cb);
  color: #155724;
  border-left: 4px solid #28a745;
}

.alert-danger {
  background: linear-gradient(135deg, #f8d7da, #f5c6cb);
  color: #721c24;
  border-left: 4px solid #dc3545;
}

.alert-warning {
  background: linear-gradient(135deg, #fff3cd, #ffeaa7);
  color: #856404;
  border-left: 4px solid #ffc107;
}

.btn-close {
  padding: 0.5rem;
  background: transparent url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23000'%3e%3cpath d='M.293.293a1 1 0 0 1 1.414 0L8 6.586 14.293.293a1 1 0 1 1 1.414 1.414L9.414 8l6.293 6.293a1 1 0 0 1-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L6.586 8 .293 1.707a1 1 0 0 1 0-1.414z'/%3e%3c/svg%3e") center/1em auto no-repeat;
  opacity: 0.7;
}

.btn-close:hover {
  opacity: 1;
}

@keyframes progressBar {
  0% {
    width: 100%;
  }
  100% {
    width: 0%;
  }
}

/* Animasi masuk untuk alert */
@keyframes slideInDown {
  from {
    transform: translateY(-100%);
    opacity: 0;
  }
  to {
    transform: translateY(0);
    opacity: 1;
  }
}

.custom-alert {
  animation: slideInDown 0.3s ease-out;
}

/* Loading state untuk button */
.btn-loading {
  position: relative;
  color: transparent !important;
}

.btn-loading::after {
  content: '';
  position: absolute;
  width: 20px;
  height: 20px;
  top: 50%;
  left: 50%;
  margin-left: -10px;
  margin-top: -10px;
  border: 2px solid #ffffff;
  border-radius: 50%;
  border-right-color: transparent;
  animation: button-spinner 0.75s linear infinite;
}

@keyframes button-spinner {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}
</style>

<!-- Enhanced JavaScript untuk handling form -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('aspirasiForm');
    const submitBtn = document.getElementById('submitBtn');

    // Fungsi untuk scroll ke alert
    function scrollToAlert() {
        const alertElement = document.querySelector('.custom-alert');
        if (alertElement) {
            alertElement.scrollIntoView({ 
                behavior: 'smooth', 
                block: 'center'
            });
        }
    }


    if (form) {
        form.addEventListener('submit', function(e) {
            // Validasi file size
            const fileInput = document.getElementById('foto');
            if (fileInput.files.length > 0) {
                const fileSize = fileInput.files[0].size / 1024 / 1024; // MB
                if (fileSize > 2) {
                    e.preventDefault();
                    showCustomError('Ukuran file maksimal 2MB');
                    return;
                }
            }

            // Loading state dengan animasi yang lebih smooth
            submitBtn.disabled = true;
            submitBtn.classList.add('btn-loading');
            submitBtn.innerHTML = 'Mengirim...';
            
            // Tambahkan efek shake jika ada error validation
            setTimeout(() => {
                const invalidFields = form.querySelectorAll(':invalid');
                invalidFields.forEach(field => {
                    field.style.animation = 'shake 0.5s';
                    setTimeout(() => {
                        field.style.animation = '';
                    }, 500);
                });
            }, 100);
        });
    }

    // Auto-hide alerts dengan progress bar
    const alerts = document.querySelectorAll('.custom-alert');
    alerts.forEach(function(alert) {
        const closeTime = 5000; // 5 detik
        
        setTimeout(() => {
            if (alert.parentNode) {
                alert.style.opacity = '0';
                alert.style.transform = 'translateY(-20px)';
                alert.style.transition = 'all 0.3s ease';
                
                setTimeout(() => {
                    if (alert.parentNode) {
                        alert.remove();
                    }
                }, 300);
            }
        }, closeTime);
    });

    // Fungsi untuk menampilkan error custom
    function showCustomError(message) {
        // Hapus alert error yang sudah ada
        const existingError = document.querySelector('.custom-alert.alert-danger');
        if (existingError) {
            existingError.remove();
        }

        // Buat alert error baru
        const errorAlert = document.createElement('div');
        errorAlert.className = 'alert alert-danger alert-dismissible fade show custom-alert';
        errorAlert.innerHTML = `
            <div class="d-flex align-items-center">
                <div class="alert-icon">
                    <i class="fas fa-exclamation-circle"></i>
                </div>
                <div class="alert-content flex-grow-1">
                    <h6 class="alert-title">Terjadi Kesalahan!</h6>
                    <p class="alert-message mb-0">${message}</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="alert-progress">
                <div class="alert-progress-bar"></div>
            </div>
        `;

        // Sisipkan sebelum form
        form.parentNode.insertBefore(errorAlert, form);
        
        // Scroll ke alert
        setTimeout(scrollToAlert, 100);
        
        // Auto remove setelah 5 detik
        setTimeout(() => {
            if (errorAlert.parentNode) {
                errorAlert.remove();
            }
        }, 5000);
    }

    // Reset button state jika form validation gagal
    form.addEventListener('invalid', function(e) {
        setTimeout(() => {
            submitBtn.disabled = false;
            submitBtn.classList.remove('btn-loading');
            submitBtn.innerHTML = '<i class="fas fa-paper-plane me-2"></i>Kirim Pengaduan';
        }, 1000);
    }, true);
});

// CSS untuk shake animation
const style = document.createElement('style');
style.textContent = `
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        75% { transform: translateX(5px); }
    }
`;
document.head.appendChild(style);
</script>

  </main>

  <footer id="footer" class="footer">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="d-flex align-items-center">
            <span class="sitename">Sistem Pengaduan Siswa</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Jl. Pendidikan No. 123</p>
            <p>Jakarta, 12345</p>
            <p class="mt-3"><strong>Telepon:</strong> <span>(021) 1234-5678</span></p>
            <p><strong>Email:</strong> <span>pengaduan@sekolah.sch.id</span></p>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Tautan Cepat</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#hero">Beranda</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#about">Tentang</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#lapor">Lapor</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Kebijakan Privasi</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Dukungan</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#faq-2">FAQ</a></li>
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
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
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


</body>

</html>