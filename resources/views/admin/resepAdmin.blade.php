@include('layoutsAdmin.header') <!-- Menyertakan bagian header dari layout admin -->
@include('layoutsAdmin.sidebar') <!-- Menyertakan bagian sidebar dari layout admin -->
@include('layoutsAdmin.content') <!-- Menyertakan bagian konten dari layout admin -->
@include('layoutsAdmin.footer') <!-- Menyertakan bagian footer dari layout admin -->

<div class="container mt-4"> <!-- Membuka container utama dengan margin-top 4 -->
    <h1 class="text-center mb-4">DATA RESEP</h1> <!-- Judul halaman dengan teks di tengah dan margin bawah 4 -->
    
    <!-- Tombol untuk menambahkan data resep baru -->
    <a href="/tambahResep" type="button" class="btn btn-success">Tambah Data Resep</a>

    <div class="row"> <!-- Membuka baris untuk form pencarian -->
        <div class="col-md-6 mt-3"> <!-- Kolom dengan margin-top 3 -->
            <!-- Form pencarian resep -->
            <form action="{{ route('resepAdmin') }}" method="GET">
                <div class="input-group mb-3"> <!-- Grup input dengan margin bawah 3 -->
                    <input type="text" name="search" id="search" class="form-control" placeholder="Cari resep..." value="{{ request()->input('search') }}"> <!-- Input teks untuk pencarian resep -->
                    <button class="btn btn-outline-secondary" type="submit">Cari</button> <!-- Tombol untuk mengirimkan form pencarian -->
                </div>
            </form>
        </div>
    </div>

    <div class="row"> <!-- Membuka baris untuk menampilkan pesan sukses -->
        @if ($message = Session::get('succes')) <!-- Mengecek jika ada pesan sukses -->
            <div class="alert alert-success" role="alert"> <!-- Menampilkan pesan sukses -->
                {{$message}}
            </div>
        @endif
    </div>

    <table class="table mt-3"> <!-- Membuka tabel dengan margin-top 3 -->
        <thead> <!-- Bagian kepala tabel -->
            <tr>
                <th scope="col">No</th> <!-- Kolom nomor urut -->
                <th scope="col">Nama Resep</th> <!-- Kolom nama resep -->
                <th scope="col">Deskripsi Pendek</th> <!-- Kolom deskripsi pendek -->
                <th scope="col">Gambar</th> <!-- Kolom gambar -->
                <th scope="col">Action</th> <!-- Kolom aksi -->
            </tr>
        </thead>
        <tbody> <!-- Bagian tubuh tabel -->
            @php
                $no = 1; <!-- Inisialisasi nomor urut -->
            @endphp

            @foreach ($data as $index => $d) <!-- Looping melalui setiap item dalam koleksi data resep -->
                <tr>
                    <th scope="row">{{ $index + $data->firstItem() }}</th> <!-- Menampilkan nomor urut dengan menambahkan indeks ke nomor item pertama -->
                    <td>{{$d->nama}}</td> <!-- Menampilkan nama resep dari objek $d -->
                    <td>{{$d->kategori}}</td> <!-- Menampilkan kategori resep dari objek $d -->
                    <td>{{$d->deskripsi}}</td> <!-- Menampilkan deskripsi resep dari objek $d -->
                    <td>
                        <!-- Menampilkan gambar resep -->
                        <img src="{{ asset('storage/gambarResep/' . $d->gambar) }}" style="width:78px;">
                    </td>
                    <td>
                        <!-- Tombol untuk mengedit data resep -->
                        <a href="/tampilkanResep/{{$d->id}}" class="btn btn-primary">Edit</a>
                        
                        <!-- Tombol untuk menghapus data resep -->
                        <a href="#" type="button" class="btn btn-danger" onclick="confirmDelete('{{ $d->id }}')">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Menampilkan navigasi pagination untuk koleksi data resep -->
    {{ $data->links() }}
</div> <!-- Menutup container utama -->

<script>
    function confirmDelete(id) {
        let url = '/deleteResep/' + id; 
        if (confirm('Apakah Anda yakin akan menghapus data ini?')) { <!-- Konfirmasi sebelum menghapus data -->
            window.location.href = url; <!-- Mengarahkan ke URL penghapusan resep -->
        }
    }
</script>
