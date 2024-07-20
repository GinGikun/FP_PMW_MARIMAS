@include('layoutsAdmin.header') <!-- Menyertakan bagian header dari layout admin -->
@include('layoutsAdmin.sidebar') <!-- Menyertakan bagian sidebar dari layout admin -->
@include('layoutsAdmin.content') <!-- Menyertakan bagian konten dari layout admin -->
@include('layoutsAdmin.footer') <!-- Menyertakan bagian footer dari layout admin -->

<div class="container mt-4"> <!-- Membuka container utama dengan margin-top 4 -->
    <h1 class="text-center mb-4">Tambah Data Resep</h1> <!-- Judul halaman dengan teks di tengah dan margin bawah 4 -->

    <div class="row justify-content-center"> <!-- Membuka baris dengan penyelarasan konten di tengah -->
        <div class="col-10"> <!-- Kolom dengan lebar 10 dari 12 kolom -->
            <div class="card"> <!-- Membuka card untuk membungkus form -->
                <div class="card-body"> <!-- Bagian tubuh card -->
                    <!-- Form untuk menambahkan resep baru -->
                    <form action="{{ route('insertResep') }}" method="POST" enctype="multipart/form-data"> <!-- Mengarahkan ke rute 'insertResep' dengan metode POST dan mengizinkan upload file -->
                        @csrf <!-- Token CSRF untuk keamanan formulir -->

                        <!-- Input untuk nama resep -->
                        <div class="form-group">
                            <label for="nama">Nama Resep</label>
                            <input type="text" name="nama" class="form-control" id="nama" required> <!-- Input teks untuk nama resep -->
                        </div>

                        <!-- Input untuk kategori resep -->
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <input type="text" name="kategori" class="form-control" id="kategori" required> <!-- Input teks untuk kategori resep -->
                        </div>

                        <!-- Input untuk deskripsi pendek resep -->
                        <div class="form-group">
                            <label for="deskripsi-pendek">Deskripsi Pendek</label>
                            <textarea name="deskripsi" class="form-control" id="deskripsi" required></textarea> <!-- Textarea untuk deskripsi pendek -->
                        </div>

                        <!-- Input untuk deskripsi panjang resep -->
                        <div class="form-group">
                            <label for="deskripsi-panjang">Deskripsi Panjang</label>
                            <textarea name="deskripsi_panjang" class="form-control" id="deskripsi-panjang" required></textarea> <!-- Textarea untuk deskripsi panjang -->
                        </div>

                        <!-- Input untuk gambar resep -->
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" name="gambar" class="form-control" id="gambar" required> <!-- Input file untuk mengunggah gambar resep -->
                        </div>

                        <!-- Tombol untuk mengirimkan form -->
                        <button type="submit" class="btn btn-primary">Tambah Resep</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
