@extends('layouts.main') <!-- Menggunakan layout utama yang didefinisikan dalam file layouts/main.blade.php -->

@section('container') <!-- Memulai section 'container' untuk memasukkan konten utama halaman -->

<div class="container">
    <!-- Bagian pencarian produk -->
    <div class="search">
        <!-- Formulir pencarian dengan metode GET yang mengarah ke route 'produk' -->
        <form action="{{ route('produk') }}" method="GET">
            <!-- Input teks untuk pencarian produk, dengan nilai default dari permintaan pencarian saat ini -->
            <input type="text" name="search" placeholder="Produk yang anda cari" value="{{ request('search') }}">
        </form>
    </div>

    <!-- Penjelasan mengenai produk yang tersedia -->
    <div class="penjelasan-resep">
        <h2>Pilihan Produk</h2>
        <p>Silahkan cari Produk yang anda butuhkan pada pilihan Produk di bawah</p>
    </div>

    <div class="container">
        <!-- Baris dengan grid dan jarak antar kolom -->
        <div class="row g-5">
            <!-- Looping melalui data produk yang diterima dari controller -->
            @foreach ($data as $d)
                <!-- Kolom untuk setiap kartu produk -->
                <div class="col-12 col-lg-3">
                    <div class="card shadow-sm border-0 rounded">
                        <!-- Gambar produk dari penyimpanan -->
                        <img src="{{ asset('storage/gambarProduk/' . $d->gambar) }}" class="card-img-top card-produk" alt="" />
                        <div class="card-body">
                            <!-- Judul produk -->
                            <h3 class="card-title">{{ $d->produk }}</h3>
                            <!-- Tombol untuk melihat detail produk dengan tautan ke halaman detail produk -->
                            <button class="btn"><a href="{{ route('detailProduk', $d->id) }}">Lihat Produk</a></button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection <!-- Menutup section 'container' -->
