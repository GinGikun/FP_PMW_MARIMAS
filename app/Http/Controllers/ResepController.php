<?php

namespace App\Http\Controllers;

use App\Models\Resep; // Mengimpor model Resep
use Illuminate\Http\Request; // Mengimpor Request untuk menangani permintaan HTTP
use Illuminate\Support\Facades\Storage; // Mengimpor Storage untuk menangani penyimpanan file
use RealRashid\SweetAlert\Facades\Alert; // Mengimpor SweetAlert untuk notifikasi

class ResepController extends Controller
{
    /**
     * Menampilkan daftar resep dengan fitur pencarian.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request){
        $query = $request->input('search'); // Mengambil input pencarian
        if ($query) {
            // Jika ada pencarian, filter resep berdasarkan nama atau kategori
            $data = Resep::where('nama', 'LIKE', '%' . $query . '%')
                          ->orWhere('kategori', 'LIKE', '%' . $query . '%')
                          ->paginate(5); // Membatasi hasil pencarian menjadi 5 per halaman
        } else {
            // Jika tidak ada pencarian, ambil semua resep dengan paginasi
            $data = Resep::paginate(5);
        }

        // Mengembalikan view dengan data resep
        return view('admin.resepAdmin', compact('data'));
    }

    /**
     * Menampilkan halaman tambah resep.
     *
     * @return \Illuminate\View\View
     */
    public function tambahResep(){
        return view('admin.tambahResep'); // Mengembalikan view untuk menambahkan resep baru
    }

    /**
     * Menangani penyimpanan resep baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function insertResep(Request $request){
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'required|max:700',
            'deskripsi_panjang' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Simpan gambar yang diunggah
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar'); // Mengambil file gambar
            $nama_gambar = time() . '.' . $gambar->getClientOriginalExtension(); // Membuat nama unik untuk file gambar
            $gambar->storeAs('public/gambarResep', $nama_gambar); // Menyimpan file gambar ke direktori storage

            // Simpan data resep ke dalam database
            $data = Resep::create([
                'nama' => $request->nama,
                'kategori' => $request->kategori,
                'deskripsi' => $request->deskripsi,
                'deskripsi_panjang' => $request->deskripsi_panjang,
                'gambar' => $nama_gambar,
            ]);

            // Mengarahkan kembali ke halaman resep admin dengan pesan sukses
            return redirect()->route('resepAdmin')->with('success', 'Data Resep Berhasil di Tambahkan');
        } else {
            // Jika gambar tidak diunggah, kembalikan ke halaman sebelumnya dengan pesan error
            return redirect()->back()->withInput()->withErrors(['gambar' => 'File gambar wajib diunggah.']);
        }
    }

    /**
     * Menampilkan detail resep untuk diedit.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function tampilkanResep($id){
        $data = Resep::find($id); // Mencari data resep berdasarkan ID
        return view('admin.tampilkanResep', compact('data')); // Mengembalikan view untuk menampilkan detail resep
    }

    /**
     * Menangani update data resep.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateResep(Request $request, $id){
        $data = Resep::find($id); // Mencari data resep berdasarkan ID
        $data->update($request->all()); // Mengupdate data resep dengan input baru

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($data->gambar && Storage::exists('public/gambarResep/' . $data->gambar)) {
                Storage::delete('public/gambarResep/' . $data->gambar);
            }

            // Unggah gambar baru
            $image = $request->file('gambar'); // Mengambil file gambar baru
            $filename = time() . '.' . $image->getClientOriginalExtension(); // Membuat nama unik untuk file gambar
            $path = $request->file('gambar')->storeAs('public/gambarResep', $filename); // Menyimpan gambar di direktori storage

            // Perbarui nama gambar di database
            $data->gambar = $filename;
            $data->save();
        }

        // Mengarahkan kembali ke halaman resep admin dengan pesan sukses
        return redirect()->route('resepAdmin')->with('success', 'Data Resep Berhasil di Update');
    }

    /**
     * Menghapus data resep.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteResep($id){
        $data = Resep::find($id); // Mencari data resep berdasarkan ID
        $data->delete(); // Menghapus data resep
        return redirect()->route('resepAdmin')->with('success', 'Data Resep Berhasil di Hapus'); // Mengarahkan kembali ke halaman resep admin dengan pesan sukses
    }

    /**
     * Menampilkan daftar resep di halaman utama dengan fitur pencarian.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function home(Request $request){
        $query = $request->input('search'); // Mengambil input pencarian
        if ($query) {
            // Jika ada pencarian, filter resep berdasarkan nama atau kategori
            $data = Resep::where('nama', 'LIKE', '%' . $query . '%')
                          ->orWhere('kategori', 'LIKE', '%' . $query . '%')
                          ->paginate(8); // Membatasi hasil pencarian menjadi 8 per halaman
        } else {
            // Jika tidak ada pencarian, ambil semua resep dengan paginasi
            $data = Resep::paginate(8);
        }

        // Mengembalikan view dengan data resep
        return view('home', compact('data'));
    }

    /**
     * Menampilkan daftar resep di halaman resep dengan fitur pencarian.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function resep(Request $request){
        $query = $request->input('search'); // Mengambil input pencarian
        if ($query) {
            // Jika ada pencarian, filter resep berdasarkan nama atau kategori
            $data = Resep::where('nama', 'LIKE', '%' . $query . '%')
                          ->orWhere('kategori', 'LIKE', '%' . $query . '%')
                          ->paginate(8); // Membatasi hasil pencarian menjadi 8 per halaman
        } else {
            // Jika tidak ada pencarian, ambil semua resep dengan paginasi
            $data = Resep::paginate(8);
        }

        // Mengembalikan view dengan data resep
        return view('resep', compact('data'));
    }

    /**
     * Menampilkan detail resep di halaman utama.
     *
     * @param  int  $id
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function detailResep($id){
        $data = Resep::find($id); // Mencari data resep berdasarkan ID

        if ($data) {
            // Jika data resep ditemukan, kembalikan view dengan data resep
            return view('detailResep', compact('data'));
        } else {
            // Jika data resep tidak ditemukan, kembalikan ke halaman utama dengan pesan error
            return redirect()->route('home')->with('error', 'Data Resep tidak ditemukan');
        }
    }
}
