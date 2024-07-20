<?php

use Illuminate\Database\Migrations\Migration; // Mengimpor class Migration untuk migrasi database
use Illuminate\Database\Schema\Blueprint; // Mengimpor class Blueprint untuk mendefinisikan struktur tabel
use Illuminate\Support\Facades\Schema; // Mengimpor class Schema untuk menjalankan operasi pada database

// Mendefinisikan migrasi untuk membuat tabel 'users'
class CreateUsersTable extends Migration
{
    /**
     * Menjalankan migrasi untuk membuat tabel 'users'.
     *
     * @return void
     */
    public function up()
    {
        // Membuat tabel 'users' dengan kolom-kolom yang ditentukan
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Kolom auto-increment ID
            $table->string('name'); // Kolom untuk menyimpan nama pengguna
            $table->string('level'); // Kolom untuk menyimpan level atau peran pengguna
            $table->string('email')->unique(); // Kolom untuk menyimpan email pengguna, harus unik
            $table->timestamp('email_verified_at')->nullable(); // Kolom untuk menyimpan timestamp verifikasi email, nullable jika belum diverifikasi
            $table->string('password'); // Kolom untuk menyimpan kata sandi pengguna
            $table->rememberToken(); // Kolom untuk menyimpan token "remember me" pengguna
            $table->timestamps(); // Kolom untuk menyimpan timestamp created_at dan updated_at
        });
    }

    /**
     * Membalikkan migrasi dengan menghapus tabel 'users'.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users'); // Menghapus tabel 'users' jika ada
    }
}
