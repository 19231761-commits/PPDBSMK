<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    // Menampilkan daftar user (alternatif untuk Livewire jika dibutuhkan)
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('backend.v_user.index', compact('users'));
    }

    // Menampilkan form create user
    public function create()
    {
        return view('backend.v_user.create');
    }

    // Menyimpan user baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'hp' => 'required|digits_between:10,13',
            'role' => 'required|in:admin_ppdb,pendaftar',
        ]);

        User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->hp,
            'role' => $request->role,
        ]);

        return redirect()->route('backend.user.index')->with('success', 'User berhasil ditambahkan');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $judul = "Edit User"; // atau judul lain sesuai kebutuhan
        return view('backend.v_user.edit', compact('user', 'judul'));
    }

    // Proses update user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin_ppdb,pendaftar',
            'hp' => 'required|digits_between:10,13'
        ]);

        $data = [
            'name' => $request->nama,
            'email' => $request->email,
            'role' => $request->role,
            'phone' => $request->hp,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('backend.user.index')->with('success', 'User berhasil diperbarui');
    }

    // Menghapus user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('backend.user.index')->with('success', 'User berhasil dihapus');
    }
}
