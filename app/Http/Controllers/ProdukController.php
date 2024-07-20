<?php

namespace App\Http\Controllers;

use App\Models\Produk; // Mengimpor model Produk
use Illuminate\Http\Request; // Mengimpor Request untuk menangani permintaan HTTP
use Illuminate\Support\Facades\Storage; // Mengimpor Storage untuk menangani penyimpanan file

class ProdukController extends Controller
{
    /**
     * Menampilkan daftar produk dengan fitur pencarian.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $search = $request->input('search'); // Mengambil input pencarian
        if ($search) {
            // Jika ada pencarian, filter produk berdasarkan nama, deskripsi, atau harga
            $data = Produk::where('produk', 'LIKE', "%{$search}%")
                        ->orWhere('deskripsi', 'LIKE', "%{$search}%")
                        ->orWhere('harga', 'LIKE', "%{$search}%")
                        ->paginate(5); // Membatasi hasil pencarian menjadi 5 per halaman
        } else {
            // Jika tidak ada pencarian, ambil semua produk dengan paginasi
            $data = Produk::paginate(5);
        }

        // Mengembalikan view dengan data produk
        return view('admin.produkAdmin', compact('data'));
    }

    /**
     * Menampilkan halaman tambah produk.
     *
     * @return \Illuminate\View\View
     */
    public function tambahProduk()
    {
        return view('admin.tambahProduk'); // Mengembalikan view untuk menambahkan produk baru
    }

    /**
     * Menangani penyimpanan produk baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function insertProduk(Request $request)
    {
        // Validasi input
        $request->validate([
            'produk' => 'required|string|max:255',
            'harga' => 'required|string|max:255',
            'deskripsi' => 'required|max:700',
            'deskripsi_panjang' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'required|string|max:255'
        ]);

        if ($request->hasFile('gambar')) {
            // Mengambil file gambar
            $gambar = $request->file('gambar');
            // Membuat nama unik untuk file gambar
            $nama_gambar = time() . '.' . $gambar->getClientOriginalExtension();
            // Menyimpan file gambar ke direktori storage
            $gambar->storeAs('public/gambarProduk', $nama_gambar);

            // Menyimpan data produk ke database
            Produk::create([
                'produk' => $request->produk,
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
                'deskripsi_panjang' => $request->deskripsi_panjang,
                'gambar' => $nama_gambar,
                'link' => $request->link
            ]);

            // Mengarahkan kembali ke halaman produk admin dengan pesan sukses
            return redirect()->route('produkAdmin')->with('success', 'Data Produk Berhasil Ditambahkan');
        } else {
            // Jika gambar tidak diunggah, kembalikan ke halaman sebelumnya dengan pesan error
            return redirect()->back()->withInput()->withErrors(['gambar' => 'File gambar wajib diunggah.']);
        }
    }

    /**
     * Menampilkan detail produk untuk diedit.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function tampilkanProduk($id)
    {
        // Mencari data produk berdasarkan ID
        $data = Produk::find($id);
        // Mengembalikan view untuk menampilkan detail produk
        return view('admin.tampilkanProduk', compact('data'));
    }

    /**
     * Menangani update data produk.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProduk(Request $request, $id)
    {
        // Mencari data produk berdasarkan ID
        $data = Produk::find($id);
        // Mengupdate data produk dengan input baru
        $data->update($request->all());

        if ($request->hasFile('gambar')) {
            // Jika ada file gambar baru, hapus gambar lama
            if ($data->gambar && Storage::exists('public/gambarProduk/' . $data->gambar)) {
                Storage::delete('public/gambarProduk/' . $data->gambar);
            }

            // Menyimpan file gambar baru
            $image = $request->file('gambar');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $request->file('gambar')->storeAs('public/gambarProduk', $filename);
            // Memperbarui nama gambar di database
            $data->gambar = $filename;
            $data->save();
        }

        // Mengarahkan kembali ke halaman produk admin dengan pesan sukses
        return redirect()->route('produkAdmin')->with('success', 'Data Produk Berhasil Diupdate');
    }

    /**
     * Menghapus data produk.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteProduk($id)
    {
        // Mencari data produk berdasarkan ID
        $data = Produk::find($id);
        // Menghapus data produk
        $data->delete();
        // Mengarahkan kembali ke halaman produk admin dengan pesan sukses
        return redirect()->route('produkAdmin')->with('success', 'Data Produk Berhasil Dihapus');
    }

    /**
     * Menampilkan daftar produk di halaman utama.
     *
     * @return \Illuminate\View\View
     */
    public function produk()
    {
        $search = request('search'); // Mengambil input pencarian
        if ($search) {
            // Jika ada pencarian, filter produk berdasarkan nama, deskripsi, atau harga
            $data = Produk::where('produk', 'LIKE', "%{$search}%")
                        ->orWhere('deskripsi', 'LIKE', "%{$search}%")
                        ->orWhere('harga', 'LIKE', "%{$search}%")
                        ->paginate(8); // Membatasi hasil pencarian menjadi 8 per halaman
        } else {
            // Jika tidak ada pencarian, ambil semua produk dengan paginasi
            $data = Produk::paginate(8);
        }

        // Mengembalikan view dengan data produk
        return view('produk', compact('data'));
    }

    /**
     * Menampilkan detail produk di halaman utama.
     *
     * @param  int  $id
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function detailProduk($id)
    {
        // Mencari data produk berdasarkan ID
        $data = Produk::find($id);

        if ($data) {
            // Jika data produk ditemukan, kembalikan view dengan data produk
            return view('detailProduk', compact('data'));
        } else {
            // Jika data produk tidak ditemukan, kembalikan ke halaman produk dengan pesan error
            return redirect()->route('produk')->with('error', 'Data Produk tidak ditemukan');
        }
    }
}
