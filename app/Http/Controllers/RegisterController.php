<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('backend.v_register.register', [
            'judul' => 'Daftar Akun Pendaftar',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'hp' => 'required|digits_between:10,13',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['nama'],
            'email' => $validated['email'],
            'phone' => $validated['hp'],
            'role' => 'pendaftar',
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('backend.pendaftaran.form')->with('success', 'Akun berhasil dibuat dan Anda sudah login sebagai pendaftar baru. Silakan lengkapi formulir pendaftaran.');
    }
}