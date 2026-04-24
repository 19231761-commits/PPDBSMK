<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Tampilkan halaman login
    public function loginBackend()
    {
        return view('backend.v_login.login', [
            'judul' => 'Login PPDB',
        ]);
    }

    // Proses login dengan role-based redirect
    public function authenticateBackend(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Cek status akun
            if ($user && !$user->status) {
                Auth::logout();
                return back()->with('error', 'Akun Anda belum aktif. Silakan hubungi admin PPDB.');
            }

            // Role-based redirect
            switch ($user->role) {
                case 'pendaftar':
                    // Redirect pendaftar ke form pendaftaran
                    return redirect()->route('backend.pendaftaran.form')
                        ->with('success', 'Selamat datang ' . $user->nama . '! Silakan lengkapi form pendaftaran.');
                
                case 'admin_ppdb':
                    // Redirect admin PPDB ke dashboard admin
                    return redirect()->route('backend.beranda')
                        ->with('success', 'Selamat datang Admin! Anda masuk sebagai Admin PPDB.');
                
                default:
                    // Default redirect ke beranda
                    return redirect()->route('backend.beranda')
                        ->with('success', 'Login berhasil!');
            }
        }

        return back()
            ->withInput($request->only('email'))
            ->with('error', 'Login gagal. Periksa email dan password Anda.');
    }

    public function logoutBackend(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('backend.login');
    }
}