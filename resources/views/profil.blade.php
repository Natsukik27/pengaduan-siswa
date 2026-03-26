<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Profil Sekolah - Sistem Pengaduan Siswa</title>
  <meta name="description" content="Profil lengkap SMK Cinta Kasih Tzu Chi">
  <meta name="keywords" content="profil sekolah, SMK Cinta Kasih Tzu Chi, visi misi sekolah">
  
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
          <li><a href="{{ url('/search') }}">search</a></li>
          <li><a href="{{ url('/profil') }}" class="active">Profil</a></li>
          <li><a href="{{ url('/') }}#lapor" class="nav-link scrollto">Lapor</a></li>

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

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
            <h1>SMK Cinta Kasih Tzu Chi</h1>
            <p>Mendidik dengan Kasih, Mencerahkan dengan Kebijaksanaan - Sekolah yang mengintegrasikan pendidikan vokasi dengan nilai-nilai humanis Tzu Chi untuk membentuk generasi penerus yang berkarakter dan terampil.</p>
            <div class="d-flex">
              <a href="#profile" class="btn-get-started scrollto">Lihat Profil Lengkap</a>
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
            <img src="{{ asset('frontend-template/assets/img/hero-img.png') }}" class="img-fluid animated" alt="SMK Cinta Kasih Tzu Chi">
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Profile Section -->
    <section id="profile" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Profil Sekolah</h2>
        <p>Mengenal lebih dekat SMK Cinta Kasih Tzu Chi</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <p>
              SMK Cinta Kasih Tzu Chi merupakan sekolah menengah kejuruan yang mengintegrasikan pendidikan vokasi dengan nilai-nilai humanis Tzu Chi. Kami berkomitmen untuk membentuk siswa yang tidak hanya terampil secara teknis tetapi juga memiliki karakter yang baik dan kepedulian sosial.
            </p>
            <ul>
              <li><i class="bi bi-check2-circle"></i> <span>Pendidikan berbasis karakter dan kompetensi</span></li>
              <li><i class="bi bi-check2-circle"></i> <span>Fasilitas pembelajaran yang modern dan lengkap</span></li>
              <li><i class="bi bi-check2-circle"></i> <span>Lingkungan belajar yang nyaman dan inspiratif</span></li>
            </ul>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
                "Pendidikan Berbasis Karakter dengan Nilai-nilai Humanis Tzu Chi"
              </p>
              <div class="position-relative mt-4">
                
              </div>
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Profile Section -->

    <!-- Why Us Section -->
    <section id="why-us" class="section why-us light-background">

      <div class="container-fluid">

        <div class="row gy-4">

          <div class="col-lg-7 d-flex flex-column justify-content-center order-2 order-lg-1">

            <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100">
              <h3><span>Mengapa Memilih </span><strong>SMK Cinta Kasih Tzu Chi?</strong></h3>
              <p>
                Kami menawarkan pendidikan terpadu yang menggabungkan keunggulan akademik, pengembangan karakter, dan pembinaan spiritual berdasarkan nilai-nilai Tzu Chi.
              </p>
            </div>

            <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">

              <div class="faq-item faq-active">
                <h3><span>01</span> Apa keunggulan pendidikan di SMK Cinta Kasih Tzu Chi?</h3>
                <div class="faq-content">
                  <p>Kami menggabungkan pendidikan vokasi berkualitas dengan pembentukan karakter berdasarkan nilai-nilai Tzu Chi seperti kasih sayang, kebajikan, dan kepedulian sosial.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3><span>02</span> Bagaimana sistem pembelajaran yang diterapkan?</h3>
                <div class="faq-content">
                  <p>Sistem pembelajaran kami mengintegrasikan teori dan praktik dengan perbandingan 40:60, didukung fasilitas modern dan guru yang berpengalaman di bidangnya.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3><span>03</span> Apa saja program keahlian yang tersedia?</h3>
                <div class="faq-content">
                  <p>Kami menyediakan 8 program keahlian unggulan meliputi Teknik Komputer, Rekayasa Perangkat Lunak, Teknik Kendaraan Ringan, dan bidang lainnya yang relevan dengan kebutuhan industri.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

            </div>

          </div>

          <div class="col-lg-5 order-1 order-lg-2 why-us-img">
            <img src="{{ asset('frontend-template/assets/img/why-us.png') }}" class="img-fluid" alt="Mengapa Memilih SMK Cinta Kasih Tzu Chi" data-aos="zoom-in" data-aos-delay="100">
          </div>

        </div>

      </div>

    </section><!-- /Why Us Section -->

    <!-- Stats Section -->
    <section id="stats" class="skills section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">

          <div class="col-lg-6 d-flex align-items-center">
            <img src="{{ asset('frontend-template/assets/img/illustration/illustration-10.webp') }}" class="img-fluid" alt="Statistik Sekolah">
          </div>

          <div class="col-lg-6 pt-4 pt-lg-0 content">

            <h3>Profil Sekolah dalam Angka</h3>
            <p class="fst-italic">
              Data dan statistik terkini yang mencerminkan perkembangan dan kualitas pendidikan di SMK Cinta Kasih Tzu Chi.
            </p>

            <div class="skills-content skills-animation">

              <div class="progress">
                <span class="skill"><span>Siswa Aktif</span> <i class="val">850</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div><!-- End Skills Item -->

              <div class="progress">
                <span class="skill"><span>Guru & Staff</span> <i class="val">65</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div><!-- End Skills Item -->

              <div class="progress">
                <span class="skill"><span>Ruang Kelas</span> <i class="val">18</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div><!-- End Skills Item -->

              <div class="progress">
                <span class="skill"><span>Program Keahlian</span> <i class="val">8</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div><!-- End Skills Item -->

            </div>

          </div>
        </div>

      </div>

    </section><!-- /Stats Section -->

    <!-- Vision Mission Section -->
    <section id="vision-mission" class="services section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Visi & Misi Sekolah</h2>
        <p>Landasan filosofi pendidikan kami dalam membentuk generasi penerus bangsa</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-xl-6 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-eye icon"></i></div>
              <h4><a href="" class="stretched-link">Visi Sekolah</a></h4>
              <p>"Menjadi SMK unggulan yang menghasilkan lulusan berkompetensi tinggi, berkarakter mulia, berwawasan lingkungan, dan memiliki jiwa sosial berdasarkan nilai-nilai Tzu Chi."</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-6 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-bullseye icon"></i></div>
              <h4><a href="" class="stretched-link">Misi Sekolah</a></h4>
              <p>Menyelenggarakan pendidikan vokasi berkualitas, menanamkan nilai-nilai Tzu Chi, mengembangkan potensi siswa holistik, dan membentuk lulusan yang mandiri dan berwawasan lingkungan.</p>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Vision Mission Section -->

    <!-- Facilities Section -->
    <section id="facilities" class="work-process section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Fasilitas Sekolah</h2>
        <p>Berbagai fasilitas pendukung pembelajaran yang modern dan lengkap</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-5">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="steps-item">
              <div class="steps-image">
                <img src="{{ asset('frontend-template/assets/img/steps/steps-1.webp') }}" alt="Laboratorium Komputer" class="img-fluid" loading="lazy">
              </div>
              <div class="steps-content">
                <div class="steps-number">01</div>
                <h3>Laboratorium Komputer</h3>
                <p>Laboratorium komputer dengan spesifikasi tinggi untuk praktik pemrograman, desain grafis, dan jaringan komputer.</p>
                <div class="steps-features">
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>PC High-End</span>
                  </div>
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Software Lengkap</span>
                  </div>
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Jaringan Stabil</span>
                  </div>
                </div>
              </div>
            </div><!-- End Steps Item -->
          </div>

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="steps-item">
              <div class="steps-image">
                <img src="{{ asset('frontend-template/assets/img/steps/steps-2.webp') }}" alt="Bengkel Praktik" class="img-fluid rounded shadow" loading="lazy">
              </div>
              <div class="steps-content">
                <div class="steps-number">02</div>
                <h3>Bengkel Praktik</h3>
                <p>Bengkel lengkap untuk program keahlian teknik mesin, otomotif, dan listrik dengan peralatan terkini.</p>
                <div class="steps-features">
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Peralatan Modern</span>
                  </div>
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Safety Equipment</span>
                  </div>
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Supervisor Ahli</span>
                  </div>
                </div>
              </div>
            </div><!-- End Steps Item -->
          </div>

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
            <div class="steps-item">
              <div class="steps-image">
                <img src="{{ asset('frontend-template/assets/img/steps/steps-3.webp') }}" alt="Perpustakaan Digital" class="img-fluid rounded shadow" loading="lazy">
              </div>
              <div class="steps-content">
                <div class="steps-number">03</div>
                <h3>Perpustakaan Digital</h3>
                <p>Koleksi lengkap buku cetak dan digital dengan akses online 24 jam dan ruang baca yang nyaman.</p>
                <div class="steps-features">
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Koleksi Lengkap</span>
                  </div>
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Akses Digital</span>
                  </div>
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Ruang Nyaman</span>
                  </div>
                </div>
              </div>
            </div><!-- End Steps Item -->
          </div>

        </div>

      </div>

    </section><!-- /Facilities Section -->

    <!-- Programs Section -->
    <section id="programs" class="section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Program Keahlian</h2>
        <p>Berbagai program keahlian yang ditawarkan untuk mempersiapkan masa depan siswa</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-xl-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-laptop icon"></i></div>
              <h4><a href="" class="stretched-link">Teknik Komputer dan Jaringan</a></h4>
              <p>Membekali siswa dengan kemampuan merancang, mengimplementasi, dan mengelola jaringan komputer serta sistem keamanan jaringan.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-code-slash icon"></i></div>
              <h4><a href="" class="stretched-link">Rekayasa Perangkat Lunak</a></h4>
              <p>Mengembangkan kompetensi dalam analisis, desain, pembuatan, dan pengujian aplikasi perangkat lunak untuk berbagai platform.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-tools icon"></i></div>
              <h4><a href="" class="stretched-link">Teknik Kendaraan Ringan</a></h4>
              <p>Melatih siswa dalam perawatan, perbaikan, dan diagnosis kendaraan ringan dengan teknologi terkini.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-bicycle icon"></i></div>
              <h4><a href="" class="stretched-link">Teknik dan Bisnis Sepeda Motor</a></h4>
              <p>Membekali kemampuan teknis perbaikan sepeda motor dan kewirausahaan di bidang otomotif.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="500">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-calculator icon"></i></div>
              <h4><a href="" class="stretched-link">Akuntansi dan Keuangan</a></h4>
              <p>Menyiapkan siswa untuk menguasai prinsip akuntansi, pengelolaan keuangan, dan administrasi perkantoran.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-cart icon"></i></div>
              <h4><a href="" class="stretched-link">Bisnis Daring dan Pemasaran</a></h4>
              <p>Mengembangkan kemampuan dalam pemasaran digital, e-commerce, dan strategi bisnis online.</p>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Programs Section -->

    <!-- Contact Info Section -->
    <section id="contact-info" class="section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Informasi Kontak</h2>
        <p>Hubungi kami untuk informasi lebih lanjut</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="info-item d-flex">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>Alamat</h3>
                <p>Jl. Raya Cilandak KKO No.1<br>Cilandak Barat, Jakarta Selatan 12430</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="info-item d-flex">
              <i class="bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Telepon</h3>
                <p>(021) 123-4567</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="info-item d-flex">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email</h3>
                <p>info@smkcktzuchi.sch.id</p>
              </div>
            </div>
          </div><!-- End Info Item -->

        </div>

      </div>

    </section><!-- /Contact Info Section -->

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
      <p>© <span>Copyright</span> <strong class="px-1 sitename">SMK Cinta Kasih Tzu Chi</strong> <span>All Rights Reserved</span></p>
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

</body>
</html>