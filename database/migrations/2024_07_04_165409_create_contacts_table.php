<?php

use Illuminate\Database\Migrations\Migration; // Mengimpor class Migration untuk migrasi database
use Illuminate\Database\Schema\Blueprint; // Mengimpor class Blueprint untuk mendefinisikan struktur tabel
use Illuminate\Support\Facades\Schema; // Mengimpor class Schema untuk menjalankan operasi pada database

// Mendefinisikan migrasi untuk membuat tabel contacts
class CreateContactsTable extends Migration
{
    /**
     * Menjalankan migrasi untuk membuat tabel contacts.
     *
     * @return void
     */
    public function up()
    {
        // Membuat tabel 'contacts' dengan kolom-kolom yang ditentukan
        Schema::create('contacts', function (Blueprint $table) {
            $table->id(); // Kolom auto-increment ID
            $table->string('nama'); // Kolom untuk menyimpan nama
            $table->string('email'); // Kolom untuk menyimpan email
            $table->string('noHp'); // Kolom untuk menyimpan nomor telepon
            $table->longText('respon'); // Kolom untuk menyimpan respon dalam format teks panjang
            $table->timestamps(); // Kolom untuk menyimpan timestamp created_at dan updated_at
        });
    }

    /**
     * Membalikkan migrasi dengan menghapus tabel contacts.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts'); // Menghapus tabel 'contacts' jika ada
    }
}
