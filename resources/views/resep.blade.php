@extends('layouts.main') <!-- Menggunakan layout utama yang didefinisikan dalam file layouts/main.blade.php -->

@section('container') <!-- Memulai section 'container' untuk memasukkan konten utama halaman -->

<div class="container">
    <!-- Bagian pencarian resep -->
    <div class="search">
        <!-- Formulir pencarian dengan metode GET yang mengarah ke route 'resep' -->
        <form action="{{ route('resep') }}" method="GET">
            <!-- Input teks untuk pencarian resep, dengan nilai default dari permintaan pencarian saat ini -->
            <input type="text" name="search" id="search" placeholder="Resep yang anda cari" value="{{ request()->input('search') }}">
        </form>
    </div>

    <!-- Penjelasan mengenai resep yang tersedia -->
    <div class="penjelasan-resep">
        <h2>Pilihan Resep</h2>
        <p>Silahkan cari resep yang anda butuhkan pada pilihan resep di bawah</p>
    </div>

    <!-- Baris dengan grid dan jarak antar kolom untuk menampilkan daftar resep -->
    <div class="row g-5 mt-4">
        <!-- Looping melalui data resep yang diterima dari controller -->
        @foreach ($data as $d)
        <!-- Kolom untuk setiap kartu resep -->
        <div class="col-12 col-lg-3">
            <div class="card shadow-sm border-0 rounded">
                <!-- Gambar resep dari penyimpanan -->
                <img src="{{ asset('storage/gambarResep/' . $d->gambar) }}" class="card-img-top card-resep" alt="" />
                <div class="card-body">
                    <!-- Judul resep -->
                    <h3 class="card-title">{{ $d->nama }}</h3>
                    <!-- Deskripsi resep -->
                    <p>{{ $d->deskripsi }}</p>
                    <!-- Tombol untuk melihat detail resep dengan tautan ke halaman detail resep -->
                    <button class="btn"><a href="{{ route('detailResep', $d->id) }}">Lihat Resep</a></button>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Menambahkan tautan pagination di bawah daftar resep -->
    <div class="d-flex justify-content-center mt-4">
        {{ $data->links() }} <!-- Menampilkan tautan pagination untuk mengontrol halaman resep -->
    </div>
</div>

@endsection <!-- Menutup section 'container' -->
