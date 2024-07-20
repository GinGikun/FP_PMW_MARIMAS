<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"> <!-- Menentukan karakter encoding untuk halaman -->
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Mengatur viewport untuk desain responsif pada perangkat seluler -->
  <title>Halaman Admin</title> <!-- Judul halaman yang muncul di tab browser -->
  
  <!-- Menghubungkan stylesheet untuk toastr (notifikasi) -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
  <!-- Font Awesome untuk ikon -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/fontawesome-free/css/all.min.css">
  
  <!-- Ionicons untuk ikon -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
  <!-- Tempusdominus Bootstrap 4 untuk pemilihan tanggal dan waktu -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  
  <!-- iCheck untuk gaya input checkbox dan radio -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  
  <!-- JQVMap untuk peta interaktif -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/jqvmap/jqvmap.min.css">
  
  <!-- Gaya tema AdminLTE -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/dist/css/adminlte.min.css">
  
  <!-- overlayScrollbars untuk gaya scrollbar kustom -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  
  <!-- Daterange picker untuk pemilihan rentang tanggal -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/daterangepicker/daterangepicker.css">
  
  <!-- summernote untuk editor teks WYSIWYG -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/summernote/summernote-bs4.min.css">
  
  <!-- Menghubungkan stylesheet Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="hold-transition login-page"> <!-- Menetapkan kelas untuk halaman login -->
  
  <div class="login-box"> <!-- Kotak login -->
    <div class="login-logo"> <!-- Logo login -->
      <a href="../../index2.html"><b>LOGIN MARIMAS</b></a> <!-- Teks logo -->
    </div>

    <div class="card"> <!-- Membuka card untuk membungkus form login -->
      <div class="card-body login-card-body"> <!-- Bagian tubuh card dengan kelas khusus untuk login -->
        <p class="login-box-msg">Silahkan Login Admin Marimas</p> <!-- Pesan login -->
        
        <!-- Form login -->
        <form action="{{ route('postLogin') }}" method="post">
          @csrf <!-- Token CSRF untuk keamanan formulir -->
          
          <!-- Input untuk email -->
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email"> <!-- Input teks untuk email -->
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span> <!-- Ikon email -->
              </div>
            </div>
          </div>
          
          <!-- Input untuk password -->
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password"> <!-- Input teks untuk password -->
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span> <!-- Ikon kunci -->
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-8">
              <!-- Ruang kosong untuk kolom kiri -->
            </div>
            
            <div class="col-4">
              <!-- Tombol untuk submit form login -->
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- jQuery untuk kebutuhan JavaScript -->
  <script src="{{asset('AdminLTE')}}/plugins/jquery/jquery.min.js"></script>
  
  <!-- jQuery UI untuk komponen antarmuka pengguna tambahan -->
  <script src="{{asset('AdminLTE')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
  
  <!-- Menyelesaikan konflik jQuery UI tooltip dengan tooltip Bootstrap -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  
  <!-- Bootstrap 4 untuk komponen dan fungsionalitas Bootstrap -->
  <script src="{{asset('AdminLTE')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  
  <!-- ChartJS untuk membuat grafik -->
  <script src="{{asset('AdminLTE')}}/plugins/chart.js/Chart.min.js"></script>
  
  <!-- Sparkline untuk grafik kecil -->
  <script src="{{asset('AdminLTE')}}/plugins/sparklines/sparkline.js"></script>
  
  <!-- JQVMap untuk peta interaktif -->
  <script src="{{asset('AdminLTE')}}/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="{{asset('AdminLTE')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  
  <!-- jQuery Knob Chart untuk grafik knob -->
  <script src="{{asset('AdminLTE')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
  
  <!-- Daterangepicker untuk pemilihan rentang tanggal -->
  <script src="{{asset('AdminLTE')}}/plugins/moment/moment.min.js"></script>
  <script src="{{asset('AdminLTE')}}/plugins/daterangepicker/daterangepicker.js"></script>
  
  <!-- Tempusdominus Bootstrap 4 untuk pemilihan tanggal dan waktu -->
  <script src="{{asset('AdminLTE')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  
  <!-- Summernote untuk editor teks WYSIWYG -->
  <script src="{{asset('AdminLTE')}}/plugins/summernote/summernote-bs4.min.js"></script>
  
  <!-- OverlayScrollbars untuk scrollbar kustom -->
  <script src="{{asset('AdminLTE')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  
  <!-- AdminLTE App untuk fungsionalitas AdminLTE -->
  <script src="{{asset('AdminLTE')}}/dist/js/adminlte.js"></script>
  
  <!-- AdminLTE demo untuk tujuan demo -->
  <script src="{{asset('AdminLTE')}}/dist/js/demo.js"></script>
  
  <!-- AdminLTE dashboard demo (ini hanya untuk tujuan demo) -->
  <script src="{{asset('AdminLTE')}}/dist/js/pages/dashboard.js"></script>
</body>
</html>
