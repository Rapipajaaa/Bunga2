<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('nama_pel', 'password', 'telepon', 'alamat');
    
        if (Auth::attempt($credentials)) {
            // Jika autentikasi berhasil, redirect ke halaman dashboard atau halaman yang diinginkan
            return redirect()->intended('/dashboard');
        } else {
            // Jika autentikasi gagal, kembalikan ke halaman login dengan pesan error
            return back()->withErrors(['nama_pel' => 'Nama pelanggan, password, nomor telepon, atau alamat salah']);
        }
    }
    
}
