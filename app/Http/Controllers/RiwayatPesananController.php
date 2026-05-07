<?php

namespace App\Http\Controllers;

use App\Models\PemesananBaju;
use App\Models\PemesananBuku;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RiwayatPesananController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();
        $userId = (string) $user->id;

        return view('backend.v_pemesanan_riwayat.index', [
            'judul' => 'Riwayat Pesanan',
            'pesananBaju' => PemesananBaju::where('user_id', $userId)->latest()->get(),
            'pesananBuku' => PemesananBuku::where('user_id', $userId)->latest()->get(),
        ]);
    }
}