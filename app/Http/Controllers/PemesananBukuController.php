<?php

namespace App\Http\Controllers;

use App\Models\PemesananBuku;
use App\Models\Pembayaransantri;
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
            'paymentMethods' => $this->paymentMethods(),
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
            'metode_pembayaran' => ['required', 'string', 'in:' . implode(',', array_keys($this->paymentMethods()))],
            'catatan' => ['nullable', 'string', 'max:500'],
        ]);

        $hargaSatuan = $this->hargaSatuanBuku();
        $totalEstimasi = $hargaSatuan * (int) $validated['jumlah_buku'];
        $paymentMethods = $this->paymentMethods();

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

        Pembayaransantri::create([
            'id_pembayaran' => 'BYR' . now()->format('YmdHis') . rand(10, 99),
            'id_santri' => $request->user()->id,
            'jenis_pembayaran' => 'Pemesanan Buku',
            'tanggal_pembayaran' => now()->toDateString(),
            'nama_santri' => $validated['nama_siswa'],
            'atas_nama' => $request->user()->name,
            'nama_bank' => $paymentMethods[$validated['metode_pembayaran']]['label'],
            'jumlah_pembayaran' => $totalEstimasi,
            'status_pembayaran' => 'pending',
        ]);

        return redirect()
            ->route('backend.pemesanan.buku')
            ->with('success', 'Pemesanan buku berhasil disimpan dan otomatis masuk ke data pembayaran. Kode: ' . $pesanan->kode_pemesanan . '. Estimasi total: Rp ' . number_format($totalEstimasi, 0, ',', '.'));
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

    private function paymentMethods(): array
    {
        return [
            'BCA' => [
                'label' => 'Transfer Bank BCA',
                'account' => 'BCA 1234567890',
                'holder' => 'Yayasan SMK Sehati',
            ],
            'BRI' => [
                'label' => 'Transfer Bank BRI',
                'account' => 'BRI 9876543210',
                'holder' => 'Yayasan SMK Sehati',
            ],
            'BNI' => [
                'label' => 'Transfer Bank BNI',
                'account' => 'BNI 1122334455',
                'holder' => 'Yayasan SMK Sehati',
            ],
            'MANDIRI' => [
                'label' => 'Transfer Bank Mandiri',
                'account' => 'Mandiri 5566778899',
                'holder' => 'Yayasan SMK Sehati',
            ],
            'DANA' => [
                'label' => 'E-Wallet DANA',
                'account' => 'DANA 081234567890',
                'holder' => 'PPDB SMK Sehati',
            ],
            'GOPAY' => [
                'label' => 'E-Wallet GoPay',
                'account' => 'GoPay 081234567891',
                'holder' => 'PPDB SMK Sehati',
            ],
            'OVO' => [
                'label' => 'E-Wallet OVO',
                'account' => 'OVO 081234567892',
                'holder' => 'PPDB SMK Sehati',
            ],
            'SHOPEEPAY' => [
                'label' => 'E-Wallet ShopeePay',
                'account' => 'ShopeePay 081234567893',
                'holder' => 'PPDB SMK Sehati',
            ],
        ];
    }
}