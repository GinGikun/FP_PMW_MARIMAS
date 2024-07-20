@extends('layouts.main') <!-- Menggunakan layout utama yang didefinisikan dalam file layouts/main.blade.php -->

@section('container') <!-- Memulai section 'container' untuk memasukkan konten utama halaman -->

<section class="hero-section py-5">
    <!-- Bagian hero dengan padding vertikal 5 -->
    <div class="container py-3">
        <div class="row g-5">
            <div class="d-flex align-items-center justify-content-between">
                <!-- Kolom untuk gambar hero -->
                <div class="col-12 col-lg-6">
                    <div class="img">
                        <!-- Menampilkan gambar hero dari direktori 'assets' -->
                        <img class="img-section" src="assets/section.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- MAIN CARD -->
<!-- Bagian utama adalah elemen section dengan kelas "featured" dan "py-5", serta ID "features" -->
<main>
    <section class="featured py-5" id="features">
        <!-- Kontainer untuk bagian fitur dengan padding vertikal 5 -->
        <div class="container">
            <!-- Judul bagian fitur -->
            <h2 class="text-dark fw-bold text-center pt-5 pb-5">
                Pilihan Resep
            </h2>
        </div>
        <div class="container">
            <!-- Baris dengan grid dan jarak antar kolom -->
            <div class="row g-5">
                <!-- Looping melalui data resep yang diterima dari controller -->
                @foreach ($data as $d)
                    <!-- Kolom untuk setiap kartu resep -->
                    <div class="col-12 col-lg-3">
                        <div class="card shadow-sm border-0 rounded">
                            <!-- Gambar resep dari penyimpanan -->
                            <img src="{{ asset('storage/gambarResep/' . $d->gambar) }}" class="card-img-top" alt="" />
                            <div class="card-body">
                                <!-- Judul dan deskripsi resep -->
                                <h3 class="card-title">{{$d->nama}}</h3>
                                <p class="card-text">
                                    {{$d->deskripsi}}
                                </p>
                                <!-- Tombol untuk melihat detail resep dengan tautan ke halaman detail resep -->
                                <a href="{{ route('detailResep', $d->id) }}"><button class="btn">Lihat Resep</button></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</main>

<!-- MAIN CARD -->

@endsection <!-- Menutup section 'container' -->
