@extends('layouts.main') <!-- Menggunakan layout utama yang didefinisikan dalam file layouts/main.blade.php -->

@section('container') <!-- Memulai section 'container' untuk memasukkan konten utama halaman -->

<!-- Kontainer utama halaman -->
<div class="container">
    <div class="row g-20"> <!-- Baris dengan grid dan jarak antar kolom yang diatur -->
        <!-- Kolom untuk gambar produk -->
        <div class="col-12 col-lg-5"> <!-- Mengatur kolom untuk tampilan kecil dan besar (12 kolom pada ukuran kecil, 5 kolom pada ukuran besar) -->
            <!-- Menampilkan gambar produk dari penyimpanan -->
            <img src="{{ asset('storage/gambarProduk/' . $data->gambar) }}" class="card-img-top card-rounded" alt="" width="300px" width="500px" />
        </div>
        <!-- Kolom untuk detail produk -->
        <div class="w-50 ps-0 ps-lg-5"> <!-- Mengatur kolom dengan lebar 50% dan padding start pada ukuran besar -->
            <header>
                <!-- Judul produk -->
                <h2 class="w-100 fw-bold title-resep">{{$data->produk}}</h2>
            </header>
            <div class="excerpt text-center text-md-start">
                <!-- Menampilkan harga produk -->
                <b>Harga : </b> {{$data->harga}}
            </div>
            <div class="my-4">
                <!-- Menampilkan deskripsi panjang produk -->
                <h4 class="fw-bold">{{$data->deskripsi_panjang}}</h4>
            </div>
            <!-- Tombol untuk melihat produk lebih lanjut -->
            <a href="{{$data->link}}" type="submit" class="btn btn-primary">Lihat Produk</a>
        </div>
    </div>
</div> 

@endsection <!-- Menutup section 'container' -->
