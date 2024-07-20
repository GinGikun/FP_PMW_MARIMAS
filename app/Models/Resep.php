<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Mengimpor trait HasFactory untuk pembuatan model
use Illuminate\Database\Eloquent\Model; // Mengimpor class Model dari Laravel

// Mendefinisikan model Resep
class Resep extends Model
{
    use HasFactory; // Menggunakan trait HasFactory untuk memungkinkan penggunaan pabrik (factory) pada model ini

    // Menentukan atribut yang tidak dapat diisi secara massal
    protected $guarded = []; // Semua atribut dapat diisi secara massal karena array kosong
}
