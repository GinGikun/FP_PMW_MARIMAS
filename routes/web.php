<?php

use Illuminate\Support\Facades\Route; // Mengimpor class Route untuk mendefinisikan rute aplikasi
use App\Http\Controllers\ResepController; // Mengimpor ResepController untuk menangani rute terkait resep
use App\Http\Controllers\ProdukController; // Mengimpor ProdukController untuk menangani rute terkait produk
use App\Http\Controllers\ContactController; // Mengimpor ContactController untuk menangani rute terkait kontak
use App\Http\Controllers\LoginController; // Mengimpor LoginController untuk menangani rute terkait login

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Rute untuk halaman utama menggunakan ResepController
Route::get('/',[ResepController::class, 'home'])->name('home');

// Rute untuk menampilkan detail resep berdasarkan ID
Route::get('/detailResep/{id}',[ResepController::class, 'detailResep'])->name('detailResep');

// Rute untuk menampilkan daftar resep
Route::get('/resep',[ResepController::class, 'resep'])->name('resep');

// Rute untuk halaman About
Route::get('/about', function () {
    return  view ('About');
});

// Rute untuk halaman kontak
Route::view('/contact', 'contact')->name('contact');

// Rute untuk menyimpan kontak melalui ContactController
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');

// Rute untuk menampilkan daftar kontak admin
Route::get('/contactAdmin', [ContactController::class, 'index'])->name('admin.contacts');

// Rute untuk halaman admin
Route::get('/admin', function () {
    return  view ('admin');
});

/* ROUTE PRODUK */
// Rute untuk menampilkan daftar produk admin
Route::get('/produkAdmin', [ProdukController::class, 'index'])->name('produkAdmin');

// Rute untuk menampilkan halaman tambah produk
Route::get('/tambahProduk', [ProdukController::class, 'tambahProduk'])->name('tambahProduk');

// Rute untuk menyimpan produk baru
Route::post('/insertProduk', [ProdukController::class, 'insertProduk'])->name('insertProduk');

// Rute untuk menampilkan produk berdasarkan ID
Route::get('/tampilkanProduk/{id}', [ProdukController::class, 'tampilkanProduk'])->name('tampilkanProduk');

// Rute untuk memperbarui produk berdasarkan ID
Route::put('/updateProduk/{id}', [ProdukController::class, 'updateProduk'])->name('updateProduk');

// Rute untuk menghapus produk berdasarkan ID
Route::delete('/deleteProduk/{id}', [ProdukController::class, 'deleteProduk'])->name('deleteProduk');

// Rute untuk menampilkan daftar produk untuk umum
Route::get('/produk', [ProdukController::class, 'produk'])->name('produk');

// Rute untuk menampilkan detail produk berdasarkan ID
Route::get('/produk/{id}', [ProdukController::class, 'detailProduk'])->name('detailProduk');

/* ROUTE RESEP ADMIN */
// Rute untuk menampilkan daftar resep admin
Route::get('/resepAdmin',[ResepController::class, 'index'])->name('resepAdmin');

// Rute untuk menampilkan halaman tambah resep
Route::get('/tambahResep',[ResepController::class, 'tambahResep'])->name('tambahResep');

// Rute untuk menyimpan resep baru
Route::post('/insertResep',[ResepController::class, 'insertResep'])->name('insertResep');

// Rute untuk menampilkan resep berdasarkan ID
Route::get('/tampilkanResep/{id}',[ResepController::class, 'tampilkanResep'])->name('tampilkanResep');

// Rute untuk memperbarui resep berdasarkan ID
Route::put('/updateResep/{id}',[ResepController::class, 'updateResep'])->name('updateResep');

// Rute untuk menghapus resep berdasarkan ID
Route::get('/deleteResep/{id}',[ResepController::class, 'deleteResep'])->name('deleteResep');

/* ROUTE LOGIN ADMIN */
// Rute untuk menampilkan halaman login admin
Route::get('/loginAdmin',[LoginController::class, 'halamanLogin'])->name('halamanLogin');

// Rute untuk memproses login admin
Route::post('/postLogin',[LoginController::class, 'postLogin'])->name('postLogin');

// Rute untuk logout admin
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');
