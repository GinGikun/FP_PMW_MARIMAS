<?php

use Illuminate\Database\Migrations\Migration; // Mengimpor class Migration untuk migrasi database
use Illuminate\Database\Schema\Blueprint; // Mengimpor class Blueprint untuk mendefinisikan struktur tabel
use Illuminate\Support\Facades\Schema; // Mengimpor class Schema untuk menjalankan operasi pada database

// Mendefinisikan migrasi untuk membuat tabel 'reseps'
class CreateResepsTable extends Migration
{
    /**
     * Menjalankan migrasi untuk membuat tabel 'reseps'.
     *
     * @return void
     */
    public function up()
    {
        // Membuat tabel 'reseps' dengan kolom-kolom yang ditentukan
        Schema::create('reseps', function (Blueprint $table) {
            $table->id(); // Kolom auto-increment ID
            $table->string('nama'); // Kolom untuk menyimpan nama resep
            $table->string('kategori'); // Kolom untuk menyimpan kategori resep
            $table->string('deskripsi'); // Kolom untuk menyimpan deskripsi singkat resep
            $table->longText('deskripsi_panjang'); // Kolom untuk menyimpan deskripsi panjang resep
            $table->string('gambar'); // Kolom untuk menyimpan nama file gambar resep
            $table->timestamps(); // Kolom untuk menyimpan timestamp created_at dan updated_at
        });
    }

    /**
     * Membalikkan migrasi dengan menghapus tabel 'reseps'.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reseps'); // Menghapus tabel 'reseps' jika ada
    }
}
