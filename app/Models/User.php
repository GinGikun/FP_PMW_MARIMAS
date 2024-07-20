<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail; // Mengimpor kontrak MustVerifyEmail jika diperlukan untuk verifikasi email
use Illuminate\Database\Eloquent\Factories\HasFactory; // Mengimpor trait HasFactory untuk pembuatan model
use Illuminate\Foundation\Auth\User as Authenticatable; // Mengimpor class Authenticatable untuk autentikasi pengguna
use Illuminate\Notifications\Notifiable; // Mengimpor trait Notifiable untuk notifikasi
use Laravel\Sanctum\HasApiTokens; // Mengimpor trait HasApiTokens untuk autentikasi API

// Mendefinisikan model User yang mewarisi dari Authenticatable
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable; // Menggunakan trait HasApiTokens, HasFactory, dan Notifiable

    /**
     * Atribut yang dapat diisi secara massal.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', // Nama pengguna
        'email', // Email pengguna
        'password', // Kata sandi pengguna
    ];

    /**
     * Atribut yang harus disembunyikan saat serialisasi.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password', // Kata sandi pengguna
        'remember_token', // Token untuk mengingat sesi pengguna
    ];

    /**
     * Atribut yang harus di-cast ke tipe data tertentu.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime', // Mengubah atribut email_verified_at menjadi tipe datetime
    ];
}
