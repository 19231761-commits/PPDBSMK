<?php

namespace App\Http\Controllers;

use App\Models\PemesananBaju;
use App\Models\Pembayaransantri;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PemesananBajuController extends Controller
{
    public function create(): View
    {
        $paymentMethods = $this->paymentMethods();

        return view('backend.v_pemesanan_baju.index', [
            'judul' => 'Form Pemesanan Baju',
            'jurusans' => $this->jurusans(),
            'paymentMethods' => $paymentMethods,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $paymentMethods = $this->paymentMethods();

        $validated = $request->validate([
            'nama_siswa' => ['required', 'string', 'max:120'],
            'jurusan' => ['required', 'string', 'in:' . implode(',', $this->jurusans())],
            'ukuran_baju' => ['required', 'string', 'in:S,M,L,XL,XXL'],
            'jumlah_pesanan' => ['required', 'integer', 'min:1', 'max:10'],
            'metode_pembayaran' => ['required', 'string', 'in:' . implode(',', array_keys($paymentMethods))],
            'warna_keterangan' => ['nullable', 'string', 'max:150'],
            'catatan' => ['nullable', 'string', 'max:500'],
        ]);

        $hargaSatuanContoh = $this->hargaSatuanContoh($validated['jurusan'], $validated['ukuran_baju']);
        $totalBayar = $hargaSatuanContoh * (int) $validated['jumlah_pesanan'];

        PemesananBaju::create([
            'user_id' => $request->user()->id_user,
            'nama_siswa' => $validated['nama_siswa'],
            'jurusan' => $validated['jurusan'],
            'ukuran_baju' => $validated['ukuran_baju'],
            'jumlah_pesanan' => $validated['jumlah_pesanan'],
            'warna_keterangan' => $validated['warna_keterangan'] ?? null,
            'catatan' => $validated['catatan'] ?? null,
        ]);

        Pembayaransantri::create([
            'id_pembayaran' => 'BYR' . now()->format('YmdHis') . rand(10, 99),
            'id_santri' => $request->user()->id_user,
            'jenis_pembayaran' => 'Pemesanan Baju',
            'tanggal_pembayaran' => now()->toDateString(),
            'nama_santri' => $validated['nama_siswa'],
            'atas_nama' => $request->user()->nama,
            'nama_bank' => $paymentMethods[$validated['metode_pembayaran']]['label'],
            'jumlah_pembayaran' => $totalBayar,
        ]);

        return redirect()
            ->route('backend.pemesanan.baju')
            ->with('success', 'Pemesanan baju berhasil disimpan dan otomatis masuk ke data pembayaran. Harga contoh: Rp ' . number_format($hargaSatuanContoh, 0, ',', '.') . ' per item.');
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

    private function hargaSatuanContoh(string $jurusan, string $ukuranBaju): int
    {
        $hargaJurusan = [
            'Farmasi Klinis & Komunitas' => 180000,
            'Asisten Keperawatan & Caregiver' => 182000,
            'Teknik Komputer & Jaringan' => 190000,
            'Teknik Sepeda Motor' => 188000,
            'Teknik Kendaraan Ringan' => 192000,
        ];

        $tambahanUkuran = [
            'S' => 0,
            'M' => 5000,
            'L' => 10000,
            'XL' => 15000,
            'XXL' => 20000,
        ];

        $hargaDasar = $hargaJurusan[$jurusan] ?? 175000;
        $biayaUkuran = $tambahanUkuran[$ukuranBaju] ?? 0;

        return $hargaDasar + $biayaUkuran;
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
