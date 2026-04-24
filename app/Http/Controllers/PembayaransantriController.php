<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaransantri;
use App\Helpers\ImageHelper;
use Barryvdh\DomPDF\Facade\Pdf;

class PembayaransantriController extends Controller
{

//index
    public function index()
    {
        $Pembayaransantri=Pembayaransantri::orderBy('updated_at', 'desc')->get();
        return view('backend.v_pembayaransantri.index', [
            'judul' => 'Pembayaran Siswa',
            'index' => $Pembayaransantri
        ]);
    }

    public function pemilik()
    {
        $Pembayaransantri = Pembayaransantri::orderBy('updated_at', 'desc')->paginate(10);
        return view('backend.pemilik.pembayaran', [
            'judul' => 'Data Pembayaran Siswa',
            'pembayaran' => $Pembayaransantri,
        ]);
    }
    
//create
    public function create()
    {
        $Pembayaransantri = Pembayaransantri::orderBy('id_pembayaran', 'asc')->get();
        return view('backend.v_pembayaransantri.create', [
            'judul' => 'Tambah Pembayaran Siswa',
            'Datasantri' => $Pembayaransantri
        ]);
    }

    public function exportPDF()
    {
        $pembayaran = Pembayaransantri::all();
        $pdf = Pdf::loadView('backend.exports.pembayaran_pdf', compact('pembayaran'));
        return $pdf->download('pembayaran_siswa.pdf');
    }
    
//store
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_pembayaran' => 'required',
            'id_santri' => 'required|string|max:255',
            'jenis_pembayaran' => 'required',
            'tanggal_pembayaran' => 'required',
            'nama_santri' => 'required',
            'atas_nama' => 'required',
            'nama_bank' => 'required',
            'jumlah_pembayaran' => 'required',
        ],[
            'required' => 'Kolom :attribute wajib diisi.',
            'email' => 'Kolom :attribute harus berupa email yang valid.',
        ]);
        Pembayaransantri::create($validatedData);
        return redirect()->route('backend.pembayaransantri.index')->with('success', 'Data berhasil tersimpan');
    }
    
    public function show(string $id)
    {
        //
    }
    
//edit
    public function edit($id)
    {
        $edit = PembayaranSantri::findOrFail($id);
        $judul = "Edit Data Pembayaran Siswa";

        return view('backend.v_pembayaransantri.edit', compact('edit', 'judul'));
    }
    
//update
    public function update(Request $request, string $id)
    {  
        $Pembayaransantri = Pembayaransantri::findOrFail($id);
        $rules = [
            'id_pembayaran' => 'required',
            'id_pendaftaran' => 'required|string|max:255',
            'jenis_pembayaran' => 'required',
            'tanggal_pembayaran' => 'required',
            'nama_santri' => 'required',
            'atas_nama' => 'required',
            'nama_bank' => 'required',
            'jumlah_pembayaran' => 'required',
        ];
        $validatedData = $request->validate($rules);
        $Pembayaransantri->update($validatedData);
        return redirect()->route('backend.pembayaransantri.index')->with('success', 'Data berhasil diperbaharui');
    }  

    //distory
    public function destroy($id)
    {
        $Pembayaransantri = Pembayaransantri::findOrFail($id);
        $Pembayaransantri->delete();
        return redirect()->route('backend.pembayaransantri.index')->with('success', 'Data berhasil dihapus');
    }
}