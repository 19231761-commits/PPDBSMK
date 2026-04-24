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
            'id_user' => 'required',
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'hp' => 'required|digits_between:10,13',
            'role' => 'required|in:admin_ppdb,pendaftar',
        ]);

        User::create([
            'id_user' => $request->id_user,
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'hp' => $request->hp,
            'role' => $request->role,
            'status' => true,
        ]);

        return redirect()->route('backend.user.index')->with('success', 'User berhasil ditambahkan');
    }

    // Menampilkan form edit
    public function edit($id_user)
    {
        $user = User::findOrFail($id_user);
        $judul = "Edit User"; // atau judul lain sesuai kebutuhan
        return view('backend.v_user.edit', compact('user', 'judul'));
    }

    // Proses update user
    public function update(Request $request, $id_user)
    {
        $user = User::findOrFail($id_user);

        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id_user . ',id_user',
            'role' => 'required|in:admin_ppdb,pendaftar',
            'status' => 'required|in:0,1',
            'hp' => 'required|digits_between:10,13'
        ]);

        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'role' => $request->role,
            'hp' => $request->hp,
            'status' => $request->status,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('backend.user.index')->with('success', 'User berhasil diperbarui');
    }

    // Menghapus user
    public function destroy($id_user)
    {
        $user = User::findOrFail($id_user);
        $user->delete();

        return redirect()->route('backend.user.index')->with('success', 'User berhasil dihapus');
    }
}
