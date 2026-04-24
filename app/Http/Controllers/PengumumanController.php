<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PengumumanController extends Controller
{
//index
    public function index()
    {
        $Pengumuman = Pengumuman::orderBy('id_pengumuman', 'desc')->get();
        return view('backend.v_pengumuman.index', [
            'judul' => 'Pengumuman',
            'index' => $Pengumuman
        ]);
    }

//create
    public function create()
    {
        $Pengumuman = Pengumuman::orderBy('id_pengumuman', 'asc')->get();
        return view('backend.v_pengumuman.create', [
            'judul' => 'Tambah Pengumuman',
            'Pengumuman' => $Pengumuman
        ]);
    }

    public function exportPengumumanTeks()
    {
        $pdf = Pdf::loadView('backend.exports.pengumuman_pdf');
        return $pdf->download('pengumuman_libur_siswa.pdf');
    }

//store
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_pengumuman' => 'required',
            'id_user' => 'required',
            'tanggal_pengumuman' => 'required',
            'judul_pengumuman' => 'required',
            'isi_pengumuman' => 'required',
        ],[
            'required' => 'Kolom :attribute wajib diisi.',
            'email' => 'Kolom :attribute harus berupa email yang valid.',
        ]);
    Pengumuman::create($validatedData);
    return redirect()->route('backend.pengumuman.index')->with('success', 'Data berhasil tersimpan');
    }

//edit
    public function edit($id)
    {
        $edit = Pengumuman::findOrFail($id);
        $judul = "Edit Data Pengumuman";

        return view('backend.v_pengumuman.edit', compact('edit', 'judul'));
    }

//update
    public function update(Request $request, string $id)
    {
        
        $Pengumuman = Pengumuman::findOrFail($id);
        $rules = [
            'id_pengumuman' => 'required',
            'id_user' => 'required',
            'tanggal_pengumuman' => 'required',
            'judul_pengumuman' => 'required',
            'isi_pengumuman' => 'required',
        ];
        $validatedData = $request->validate($rules);
        $Pengumuman->update($validatedData);
        return redirect()->route('backend.pengumuman.index')->with('success', 'Data berhasil diperbaharui');
    } 

//destory
    public function destroy($id)
    {
        $Pengumuman = Pengumuman::findOrFail($id);
        $Pengumuman->delete();
        return redirect()->route('backend.pengumuman.index')->with('success', 'Data berhasil dihapus');
    }
}