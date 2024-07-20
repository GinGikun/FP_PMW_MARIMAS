@include('layoutsAdmin.header') <!-- Menyertakan bagian header dari layout admin -->
@include('layoutsAdmin.sidebar') <!-- Menyertakan bagian sidebar dari layout admin -->
@include('layoutsAdmin.content') <!-- Menyertakan bagian konten dari layout admin -->
@include('layoutsAdmin.footer') <!-- Menyertakan bagian footer dari layout admin -->

<div class="container mt-4"> <!-- Membuka container utama dengan margin-top 4 -->
    <h1 class="text-center mb-4">DATA RESPON</h1> <!-- Judul halaman dengan teks di tengah dan margin bawah 4 -->

    <div class="row"> <!-- Membuka baris untuk konten di bawah judul -->
        @if ($message = Session::get('succes')) <!-- Memeriksa apakah ada pesan 'success' dalam sesi -->
            <div class="alert alert-success" role="alert"> <!-- Menampilkan pesan sukses dalam alert -->
                {{$message}}
            </div>
        @endif
    </div> <!-- Menutup baris -->
    
    <table class="table mt-3"> <!-- Membuka tabel dengan margin-top 3 -->
        <thead> <!-- Bagian kepala tabel -->
            <tr>
                <th scope="col">No</th> <!-- Kolom nomor -->
                <th scope="col">Nama</th> <!-- Kolom nama -->
                <th scope="col">Email</th> <!-- Kolom email -->
                <th scope="col">No Hp</th> <!-- Kolom nomor HP -->
                <th scope="col">Saran Resep</th> <!-- Kolom saran resep -->
            </tr>
        </thead>
        <tbody> <!-- Bagian tubuh tabel -->
            @php
                $no = 1; <!-- Inisialisasi variabel nomor untuk penomoran baris -->
            @endphp

            @foreach ($contacts as $contact) <!-- Looping melalui setiap item dalam koleksi contacts -->
                <tr>
                    <th scope="row">{{ $no++ }}</th> <!-- Menampilkan nomor baris yang diincrement -->
                    <td>{{$contact->nama}}</td> <!-- Menampilkan nama dari objek contact -->
                    <td>{{$contact->email}}</td> <!-- Menampilkan email dari objek contact -->
                    <td>{{$contact->noHp}}</td> <!-- Menampilkan nomor HP dari objek contact -->
                    <td>{{$contact->respon}}</td> <!-- Menampilkan respon dari objek contact -->
                    <!-- <td>{{$contact->link}}</td> --><!-- Baris ini sepertinya tidak diperlukan atau hilang -->
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $contacts->links() }} <!-- Menampilkan navigasi pagination untuk koleksi contacts -->
</div> <!-- Menutup container utama -->
