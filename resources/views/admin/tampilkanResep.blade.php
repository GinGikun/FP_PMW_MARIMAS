@include('layoutsAdmin.header') <!-- Menyertakan bagian header dari layout admin -->
@include('layoutsAdmin.sidebar') <!-- Menyertakan bagian sidebar dari layout admin -->
@include('layoutsAdmin.content') <!-- Menyertakan bagian konten dari layout admin -->
@include('layoutsAdmin.footer') <!-- Menyertakan bagian footer dari layout admin -->

<div class="container mt-4"> <!-- Membuka container utama dengan margin-top 4 -->
    <h1 class="text-center mb-4">Edit Data Resep</h1> <!-- Judul halaman dengan teks di tengah dan margin bawah 4 -->

    <div class="row justify-content-center"> <!-- Membuka baris dengan penyelarasan konten di tengah -->
        <div class="col-10"> <!-- Kolom dengan lebar 10 dari 12 kolom -->
            <div class="card"> <!-- Membuka card untuk membungkus form -->
                <div class="card-body"> <!-- Bagian tubuh card -->
                    <!-- Form untuk mengupdate data resep -->
                    <form action="{{ route('updateResep', $data->id) }}" method="POST" enctype="multipart/form-data"> <!-- Mengarahkan ke rute 'updateResep' dengan metode POST dan mengizinkan upload file -->
                        @csrf <!-- Token CSRF untuk keamanan formulir -->
                        @method('PUT') <!-- Menyertakan metode PUT untuk update data -->

                        <!-- Input untuk nama resep -->
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Resep</label>
                            <input type="text" name="nama" class="form-control" id="name" aria-describedby="name" value="{{ $data->nama }}"> <!-- Input teks untuk nama resep dengan nilai awal diambil dari data resep -->
                        </div>

                        <!-- Input untuk kategori resep -->
                        <div class="mb-3">
                            <label for="examnputEmail1" class="form-label">Kategori</label>
                            <input type="text" name="kategori" class="form-control" id="name" aria-describedby="name" value="{{ $data->kategori }}"> <!-- Input teks untuk kategori resep dengan nilai awal diambil dari data resep -->
                        </div>

                        <!-- Input untuk deskripsi resep -->
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="3" required>{{ $data->deskripsi }}</textarea> <!-- Textarea untuk deskripsi resep dengan nilai awal diambil dari data resep -->
                        </div>

                        <!-- Input untuk deskripsi panjang resep -->
                        <div class="form-group">
                            <label for="deskripsi-panjang">Deskripsi Panjang</label>
                            <textarea name="deskripsi_panjang" class="form-control" id="deskripsi" required>{{ $data->deskripsi_panjang }}</textarea> <!-- Textarea untuk deskripsi panjang dengan nilai awal diambil dari data resep -->
                        </div>

                        <!-- Input untuk gambar resep -->
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Masukan Gambar</label>
                            <input type="file" id="gambar" name="gambar" class="form-control" value="{{ $data->gambar }}"> <!-- Input file untuk mengganti gambar resep -->

                            @if ($data->gambar) <!-- Jika ada gambar sebelumnya, tampilkan -->
                                <img src="{{ asset('storage/gambarResep/' . $data->gambar) }}" class="img-fluid" alt="Gambar Resep" width="300"><br><br> <!-- Menampilkan gambar resep dengan lebar 300px -->
                            @endif
                        </div>

                        <!-- Tombol untuk mengirimkan form -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
