<?php

use Illuminate\Database\Migrations\Migration; // Mengimpor class Migration untuk migrasi database
use Illuminate\Database\Schema\Blueprint; // Mengimpor class Blueprint untuk mendefinisikan struktur tabel
use Illuminate\Support\Facades\Schema; // Mengimpor class Schema untuk menjalankan operasi pada database

// Mendefinisikan migrasi untuk membuat tabel 'produks'
class CreateProduksTable extends Migration
{
    /**
     * Menjalankan migrasi untuk membuat tabel 'produks'.
     *
     * @return void
     */
    public function up()
    {
        // Membuat tabel 'produks' dengan kolom-kolom yang ditentukan
        Schema::create('produks', function (Blueprint $table) {
            $table->id(); // Kolom auto-increment ID
            $table->string('produk'); // Kolom untuk menyimpan nama produk
            $table->string('harga'); // Kolom untuk menyimpan harga produk
            $table->string('deskripsi'); // Kolom untuk menyimpan deskripsi singkat produk
            $table->longText('deskripsi_panjang'); // Kolom untuk menyimpan deskripsi panjang produk
            $table->string('gambar'); // Kolom untuk menyimpan nama file gambar produk
            $table->string('link'); // Kolom untuk menyimpan URL terkait produk
            $table->timestamps(); // Kolom untuk menyimpan timestamp created_at dan updated_at
        });
    }

    /**
     * Membalikkan migrasi dengan menghapus tabel 'produks'.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks'); // Menghapus tabel 'produks' jika ada
    }
}
