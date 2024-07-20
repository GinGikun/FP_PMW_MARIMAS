<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- LINK BOOTSTRAP -->
  <!-- Menyertakan file CSS Bootstrap versi 5.3.0 dari CDN dengan atribut integrity dan crossorigin untuk keamanan -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
  <!-- Menghubungkan stylesheet kustom (styles.css) -->
  <link rel="stylesheet" type="text/css" href="{!! asset('style.css') !!}">
  <!-- Elemen title untuk menampilkan teks "Marimas" di tab browser -->
  <title>Marimas</title>
</head>

<body>
  <!-- HEADER -->
  <header class="bg-header">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <!-- Elemen brand navbar yang mengarah ke halaman utama dengan tooltip -->
        <a class="navbar-brand text-black fw-bold" href="/" data-bs-toggle="tooltip" data-bs-title="Marimas"
          data-bs-placement="bottom">Marimas</a>
        <!-- Tombol toggler untuk mengaktifkan collapse navbar pada perangkat kecil -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar collapse berisi link navigasi -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <!-- Daftar item navigasi -->
            <li class="nav-item px-2">
              <a class="nav-link" aria-current="/" href="/">Home</a>
            </li>
            <li class="nav-item px-2">
              <a class="nav-link" href="/resep">Resep</a>
            </li>
            <li class="nav-item px-2">
              <a class="nav-link" href="/produk">Product</a>
            </li>
            <li class="nav-item px-2">
              <a class="nav-link" href="/about">About</a>
            </li>
            <li class="nav-item px-3">
              <a class="nav-link cta" href="/contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Tempat untuk konten dinamis -->
    @yield('container')
  </header>

  <!-- FOOTER -->
  <footer>
    <div class="footer-about mb-10">
      <div class="container py-5" id="contact">
        <div class="row">
          <div class="col-12 col-lg-4">
            <!-- Kolom footer untuk informasi kontak -->
            <h3 class="fw-bold pb-3">Visit us</h3>
            <p>
              Congcat<br />
              YOGYAKARTA
            </p>
            <a href="mailto:marimas@gmail.com" class="text-dark">marimas@gmail.com</a>
          </div>
          <div class="col-12 col-lg-4">
            <!-- Kolom footer untuk link navigasi -->
            <h3 class="fw-bold pb-3">Our Link</h3>
            <div class="d-flex flex-column">
              <a href="index.html" class="text-dark">Home</a>
              <a href="resep.html" class="text-dark">Resep</a>
              <a href="produk.html" class="text-dark">Product</a>
              <a href="ABOUT.html" class="text-dark">About</a>
              <a href="contact.html" class="text-dark">Contact</a>
            </div>
          </div>
          <div class="col-12 col-lg-4">
            <!-- Kolom footer untuk ikon sosial media -->
            <h3 class="fw-bold pb-3">Follow Us</h3>
            <div class="d-flex">
              <a href="#" class="text-dark">
                <ion-icon name="logo-facebook" class="icon"></ion-icon>
              </a>
              <a href="#" class="text-dark px-3">
                <ion-icon name="logo-instagram" class="icon"></ion-icon>
              </a>
              <a href="#" class="text-dark px-3">
                <ion-icon name="logo-github" class="icon"></ion-icon>
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- Pesan hak cipta -->
      <p class="text-center copyright"> &copy; 2023 all rights reserved by marimas</p>
    </div>
  </footer>

  <!-- SCRIPT -->
  <!-- Menghubungkan skrip Popper.js untuk komponen Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <!-- Menghubungkan skrip Bootstrap JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
    integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS"
    crossorigin="anonymous"></script>
  <!-- Menghubungkan skrip Ionicons untuk ikon -->
  <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
  <!-- Inisialisasi tooltip Bootstrap -->
  <script>
    const tooltipTriggerList = document.querySelectorAll(
      '[data-bs-toggle="tooltip"]'
    );
    const tooltipList = [...tooltipTriggerList].map(
      (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
    );
  </script>
  <!-- Menyembunyikan alert setelah 2 detik -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const alert = document.getElementById('success-alert');
      if (alert) {
        setTimeout(() => {
          alert.classList.add('hidden');
        }, 2000); // 2000 milliseconds = 2 seconds
      }
    });
  </script>
</body>

</html>
