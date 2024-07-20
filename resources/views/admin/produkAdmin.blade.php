@include('layoutsAdmin.header') <!-- Menyertakan bagian header dari layout admin -->
@include('layoutsAdmin.sidebar') <!-- Menyertakan bagian sidebar dari layout admin -->
@include('layoutsAdmin.content') <!-- Menyertakan bagian konten dari layout admin -->
@include('layoutsAdmin.footer') <!-- Menyertakan bagian footer dari layout admin -->

<div class="container mt-4"> <!-- Membuka container utama dengan margin-top 4 -->
    <h1 class="text-center mb-4">Data Produk</h1> <!-- Judul halaman dengan teks di tengah dan margin bawah 4 -->
    
    <!-- Tombol untuk menambahkan data produk baru -->
    <a href="{{ route('tambahProduk') }}" type="button" class="btn btn-success mb-3">Tambah Data Produk</a>

    <table class="table mt-3"> <!-- Membuka tabel dengan margin-top 3 -->
        <div class="row"> <!-- Membuka baris untuk form pencarian -->
            <div class="col-md-6 mt-3"> <!-- Kolom dengan margin-top 3 -->
                <!-- Form pencarian produk -->
                <form action="{{ route('produkAdmin') }}" method="GET">
                    <div class="input-group mb-3"> <!-- Grup input dengan margin bawah 3 -->
                        <input type="text" name="search" id="search" class="form-control" placeholder="Cari Produk..." value="{{ request()->input('search') }}"> <!-- Input teks untuk pencarian produk -->
                        <button class="btn btn-outline-secondary" type="submit">Cari</button> <!-- Tombol untuk mengirimkan form pencarian -->
                    </div>
                </form>
            </div>
        </div>

        <thead> <!-- Bagian kepala tabel -->
            <tr>
                <th>No</th> <!-- Kolom nomor -->
                <th>Nama Produk</th> <!-- Kolom nama produk -->
                <th>Harga</th> <!-- Kolom harga -->
                <th>Deskripsi</th> <!-- Kolom deskripsi -->
                <th>Gambar</th> <!-- Kolom gambar -->
                <th>Action</th> <!-- Kolom aksi -->
            </tr>
        </thead>
        <tbody> <!-- Bagian tubuh tabel -->
            @foreach ($data as $index => $d) <!-- Looping melalui setiap item dalam koleksi data produk -->
                <tr>
                    <td>{{ $index + $data->firstItem() }}</td> <!-- Menampilkan nomor urut dengan menambahkan indeks ke nomor item pertama -->
                    <td>{{ $d->produk }}</td> <!-- Menampilkan nama produk dari objek $d -->
                    <td>{{ $d->harga }}</td> <!-- Menampilkan harga produk dari objek $d -->
                    <td>{{ $d->deskripsi }}</td> <!-- Menampilkan deskripsi produk dari objek $d -->
                    <td>
                        <!-- Menampilkan gambar produk -->
                        <img src="{{ asset('storage/gambarProduk/' . $d->gambar) }}" style="width:78px;">
                    </td>
                    <td>
                        <!-- Tombol untuk mengedit data produk -->
                        <a href="/tampilkanProduk/{{ $d->id }}" class="btn btn-primary">Edit</a>
                        
                        <!-- Form untuk menghapus data produk -->
                        <form action="{{ route('deleteProduk', $d->id) }}" method="POST" style="display: inline;" id="deleteProduk">
                            @csrf <!-- Token CSRF untuk keamanan -->
                            @method('DELETE') <!-- Menggunakan metode DELETE -->
                            <button type="submit" class="btn btn-danger">Delete</button> <!-- Tombol untuk menghapus produk -->
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Menampilkan navigasi pagination untuk koleksi data produk -->
    {{ $data->links() }}
</div> <!-- Menutup container utama -->

<script>
    function confirmDelete(id) {
        let url = '/deleteProduk/' + id; 
        if (confirm('Apakah Anda yakin akan menghapus data ini?')) { <!-- Konfirmasi sebelum menghapus data -->
            window.location.href = url; <!-- Mengarahkan ke URL penghapusan produk -->
        } else {
            // Tidak melakukan apa-apa jika pengguna membatalkan
        }
    }
</script>
