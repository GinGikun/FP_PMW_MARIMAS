<?php

namespace App\Http\Controllers;

use Auth; // Mengimpor facade Auth untuk autentikasi pengguna
use Illuminate\Http\Request; // Mengimpor Request untuk menangani permintaan HTTP

class LoginController extends Controller
{
    /**
     * Menampilkan halaman login.
     *
     * @return \Illuminate\View\View
     */
    public function halamanLogin(){
        // Mengembalikan view untuk halaman login admin
        return view('auth.loginAdmin');
    }

    /**
     * Menangani proses login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin(Request $request){
        // Memeriksa kredensial pengguna dengan metode Auth::attempt
        if(Auth::attempt($request->only('email','password'))){
            // Jika autentikasi berhasil, arahkan ke dashboard admin
            return redirect('/admin');
        }
        // Jika autentikasi gagal, kembalikan ke halaman login
        return redirect('auth.loginAdmin');
    }
    
    /**
     * Menangani proses logout.
     *
     * @return \Illuminate\View\View
     */
    public function logout(){
        // Melakukan logout pengguna
        Auth::logout();
        // Mengembalikan view untuk halaman login admin
        return view('auth.loginAdmin');
    }
}