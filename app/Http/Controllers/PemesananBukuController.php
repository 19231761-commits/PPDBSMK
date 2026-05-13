<?php

namespace App\Http\Controllers;

use App\Models\PemesananBuku;
use App\Models\Pembayaransantri;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PemesananBukuController extends Controller
{
    public function create(Request $request): View
    {
        $selectedJurusan = $request->query('jurusan');

        if ($selectedJurusan && in_array($selectedJurusan, $this->jurusans(), true)) {
            return view('backend.v_pemesanan_buku.form', [
                'judul' => 'Form Pemesanan Buku',
                'jurusans' => $this->jurusans(),
                'selectedJurusan' => $selectedJurusan,
            ]);
        }

        return view('backend.v_pemesanan_buku.index', [
            'judul' => 'Pemesanan Buku',
            'jurusans' => $this->jurusans(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama_siswa' => ['required', 'string', 'max:120'],
            'jenis_kelamin' => ['required', 'in:Laki-Laki,Perempuan'],
            'jurusan' => ['required', 'string', 'in:' . implode(',', $this->jurusans())],
            'catatan' => ['nullable', 'string', 'max:500'],
        ]);

        $pesanan = PemesananBuku::create([
            'kode_pemesanan' => 'BK' . now()->format('YmdHis') . random_int(10, 99),
            'user_id' => (string) $request->user()->id,
            'nama_siswa' => $validated['nama_siswa'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'jurusan' => $validated['jurusan'],
            'jenis_buku' => 'Pemesanan Buku',
            'semester_kelas' => null,
            'jumlah_buku' => 1,
            'total_estimasi' => 550000,
            'status_pesanan' => 'menunggu',
            'catatan' => $validated['catatan'] ?? null,
        ]);

        Pembayaransantri::create([
            'id_pembayaran' => 'BYR' . now()->format('YmdHis') . rand(10, 99),
            'id_santri' => $request->user()->id,
            'jenis_pembayaran' => 'Pemesanan Buku',
            'tanggal_pembayaran' => now()->toDateString(),
            'nama_santri' => $validated['nama_siswa'],
            'atas_nama' => $request->user()->name,
            'nama_bank' => 'Pemesanan Buku',
            'jumlah_pembayaran' => 550000,
            'status_pembayaran' => 'pending',
        ]);

        return redirect()
            ->route('backend.pemesanan.baju')
            ->with('success', 'Pemesanan buku berhasil disimpan. Kode: ' . $pesanan->kode_pemesanan . '.');
    }

    private function jurusans(): array
    {
        return [
            'Farmasi Klinis & Komunitas',
            'Asisten Keperawatan & Caregiver',
            'Teknik Komputer & Jaringan',
            'Teknik Sepeda Motor',
            'Teknik Kendaraan Ringan',
        ];
    }
}