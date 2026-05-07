<?php

namespace App\Http\Controllers;

use App\Models\PemesananBuku;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PemesananBukuController extends Controller
{
    public function create(): View
    {
        return view('backend.v_pemesanan_buku.index', [
            'judul' => 'Form Pemesanan Buku',
            'jurusans' => $this->jurusans(),
            'jenisBukuOptions' => $this->jenisBukuOptions(),
            'hargaSatuanBuku' => $this->hargaSatuanBuku(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama_siswa' => ['required', 'string', 'max:120'],
            'jurusan' => ['required', 'string', 'in:' . implode(',', $this->jurusans())],
            'jenis_buku' => ['required', 'string', 'in:' . implode(',', $this->jenisBukuOptions())],
            'semester_kelas' => ['nullable', 'string', 'max:120'],
            'jumlah_buku' => ['required', 'integer', 'min:1', 'max:25'],
            'catatan' => ['nullable', 'string', 'max:500'],
        ]);

        $hargaSatuan = $this->hargaSatuanBuku();
        $totalEstimasi = $hargaSatuan * (int) $validated['jumlah_buku'];

        $pesanan = PemesananBuku::create([
            'kode_pemesanan' => 'BK' . now()->format('YmdHis') . random_int(10, 99),
            'user_id' => (string) $request->user()->id,
            'nama_siswa' => $validated['nama_siswa'],
            'jurusan' => $validated['jurusan'],
            'jenis_buku' => $validated['jenis_buku'],
            'semester_kelas' => $validated['semester_kelas'] ?? null,
            'jumlah_buku' => $validated['jumlah_buku'],
            'total_estimasi' => $totalEstimasi,
            'status_pesanan' => 'menunggu',
            'catatan' => $validated['catatan'] ?? null,
        ]);

        return redirect()
            ->route('backend.pemesanan.buku')
            ->with('success', 'Pemesanan buku berhasil disimpan dengan kode ' . $pesanan->kode_pemesanan . '. Estimasi total: Rp ' . number_format($totalEstimasi, 0, ',', '.'));
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

    private function jenisBukuOptions(): array
    {
        return [
            'Buku Paket',
            'Modul Praktik',
            'Workbook',
            'Lembar Kerja',
            'Buku Referensi',
        ];
    }

    private function hargaSatuanBuku(): int
    {
        return 25000;
    }
}