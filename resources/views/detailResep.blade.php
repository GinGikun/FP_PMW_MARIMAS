@extends('layouts.main') <!-- Menggunakan layout utama yang didefinisikan dalam file layouts/main.blade.php -->

@section('container') <!-- Memulai section 'container' untuk memasukkan konten utama halaman -->

<section>
    <!-- Kontainer utama halaman -->
    <div class="container">
        <div class="row g-20"> <!-- Baris dengan grid dan jarak antar kolom yang diatur -->
            <!-- Kolom untuk gambar resep -->
            <div class="col-12 col-lg-5"> <!-- Mengatur kolom untuk tampilan kecil dan besar (12 kolom pada ukuran kecil, 5 kolom pada ukuran besar) -->
                <!-- Menampilkan gambar resep dari penyimpanan -->
                <img src="{{ asset('storage/gambarResep/' . $data->gambar) }}" class="card-img-top card-rounded" alt="" height="300px" width="500px"/>
            </div>
            <!-- Kolom untuk detail resep -->
            <div class="w-50 ps-0 ps-lg-5"> <!-- Mengatur kolom dengan lebar 50% dan padding start pada ukuran besar -->
                <header>
                    <!-- Judul resep -->
                    <h2 class="w-100 fw-bold title-resep">{{$data->nama}}</h2>
                </header>
                <div class="excerpt text-center text-md-start">
                    <!-- Menampilkan deskripsi resep -->
                    {{$data->deskripsi}}
                </div>
                <div class="button-resep">
                    <!-- Tombol yang menunjukkan waktu dan tingkat kesulitan -->
                    <button>1 JAM</button>
                    <button>MUDAH</button>
                </div>
            </div>
        </div>
        <div>
            <!-- Judul untuk bahan dan cara pembuatan -->
            <h1 class="resep-bahan mt-4">Berikut Bahan-Bahan Yang Dibutuhkan Dan Juga Tata Cara Membuatnya</h1>
            <!-- Menampilkan deskripsi panjang resep yang mencakup bahan dan cara pembuatan -->
            <p>{{$data->deskripsi_panjang}}</p>
        </div>
    </div>
</section>

@endsection <!-- Menutup section 'container' -->
