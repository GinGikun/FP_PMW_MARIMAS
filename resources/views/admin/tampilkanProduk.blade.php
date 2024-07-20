@include('layoutsAdmin.header') <!-- Menyertakan bagian header dari layout admin -->
@include('layoutsAdmin.sidebar') <!-- Menyertakan bagian sidebar dari layout admin -->
@include('layoutsAdmin.content') <!-- Menyertakan bagian konten dari layout admin -->
@include('layoutsAdmin.footer') <!-- Menyertakan bagian footer dari layout admin -->

<div class="container mt-4"> <!-- Membuka container utama dengan margin-top 4 -->
    <h1 class="text-center mb-4">Edit Data Produk</h1> <!-- Judul halaman dengan teks di tengah dan margin bawah 4 -->

    <div class="row justify-content-center"> <!-- Membuka baris dengan penyelarasan konten di tengah -->
        <div class="col-10"> <!-- Kolom dengan lebar 10 dari 12 kolom -->
            <div class="card"> <!-- Membuka card untuk membungkus form -->
                <div class="card-body"> <!-- Bagian tubuh card -->
                    <!-- Form untuk mengupdate data produk -->
                    <form action="{{ route('updateProduk', $data->id) }}" method="POST" enctype="multipart/form-data"> <!-- Mengarahkan ke rute 'updateProduk' dengan metode POST dan mengizinkan upload file -->
                        @csrf <!-- Token CSRF untuk keamanan formulir -->
                        @method('PUT') <!-- Menyertakan metode PUT untuk update data -->

                        <!-- Input untuk nama produk -->
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
                            <input type="text" name="produk" class="form-control" id="name" aria-describedby="name" value="{{ $data->produk }}"> <!-- Input teks untuk nama produk dengan nilai awal diambil dari data produk -->
                        </div>

                        <!-- Input untuk harga produk -->
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Harga</label>
                            <input type="text" name="harga" class="form-control" id="name" aria-describedby="name" value="{{ $data->harga }}"> <!-- Input teks untuk harga produk dengan nilai awal diambil dari data produk -->
                        </div>

                        <!-- Input untuk deskripsi panjang produk -->
                        <div class="form-group">
                            <label for="deskripsi-panjang">Deskripsi</label>
                            <textarea name="deskripsi_panjang" class="form-control" id="deskripsi" required>{{ $data->deskripsi_panjang }}</textarea> <!-- Textarea untuk deskripsi panjang dengan nilai awal diambil dari data produk -->
                        </div>

                        <!-- Input untuk gambar produk -->
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Masukan Gambar</label>
                            <input type="file" id="gambar" name="gambar" class="form-control" value="{{ $data->gambar }}"> <!-- Input file untuk mengganti gambar produk -->
                            
                            @if ($data->gambar) <!-- Jika ada gambar sebelumnya, tampilkan -->
                                <img src="{{ asset('storage/gambarProduk/' . $data->gambar) }}" class="img-fluid" alt="Gambar Produk" width="300"><br><br> <!-- Menampilkan gambar produk dengan lebar 300px -->
                            @endif
                        </div>

                        <!-- Input untuk link produk -->
                        <div class="form-group">
                            <label for="nama">Link</label>
                            <input type="text" name="link" class="form-control" id="link" value="{{ $data->link }}"> <!-- Input teks untuk link produk dengan nilai awal diambil dari data produk -->
                        </div>

                        <!-- Tombol untuk mengirimkan form -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
