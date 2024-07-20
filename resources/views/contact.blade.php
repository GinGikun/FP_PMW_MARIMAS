@extends('layouts.main') <!-- Menggunakan layout utama yang didefinisikan dalam file layouts/main.blade.php -->

@section('container') <!-- Memulai section 'container' untuk memasukkan konten utama halaman -->

<!-- Kontainer utama halaman -->
<div class="container">
    <!-- Judul halaman Kontak -->
    <div class="contact-us-title">
        <h2>CONTACT US</h2>
    </div>

    <!-- Menampilkan pesan sukses jika ada -->
    @if(session('success'))
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
        </div>
    @endif

    <!-- Catatan tambahan untuk pengunjung -->
    <div class="notes">
        <p>Jangan ragu untuk menghubungi kami jika Anda memiliki pertanyaan atau masukan.</p>
    </div>

    <!-- Kontainer kosong untuk padding tambahan -->
    <div class="container">
    </div>
</div>

<!-- Formulir kontak -->
<div class="contact-form">
    <form action="{{ route('contacts.store') }}" method="POST"> <!-- Mengatur aksi form ke route 'contacts.store' dengan metode POST -->
        @csrf <!-- Menyertakan token CSRF untuk keamanan -->
        <div class="form-group">
            <label for="name">Nama:</label><br>
            <input type="text" id="name" name="nama" required><br>
            <hr>
        </div>
        <div class="form-group">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>
            <hr>
        </div>
        <div class="form-group">
            <label for="phone">Nomor HP:</label><br>
            <input type="text" id="noHp" name="noHp" required><br>
            <hr>
        </div>
        <div class="form-group">
            <label for="Resep">Masukkan resep kamu:</label><br>
            <textarea id="Resep" name="respon" rows="8" required></textarea>
            <!-- Menggunakan <textarea> untuk input resep -->
            <hr>
        </div>
        <div class="button-contact">
            <button type="submit">KIRIM</button> <!-- Tombol untuk mengirim formulir -->
        </div>
    </form>
</div>

<!-- Kontainer tambahan untuk catatan -->
<div class="container">
    <div class="notes">
        <p>Masukan Resep bertujuan agar kami bisa menambahkan resep sesuai permintaan anda. Terimakasih</p>
    </div>
</div>

@endsection <!-- Menutup section 'container' -->
