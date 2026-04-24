<?php

namespace App\Http\Controllers;

use App\Models\PendaftaranSantri;
use App\Models\Pembayaransantri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    public function berandaBackend()
    {
        $user = Auth::user();

        if ($user->role === 'admin_ppdb') {
            // Dashboard Admin PPDB
            $totalPendaftar = PendaftaranSantri::count();
            $pendaftarHariIni = PendaftaranSantri::whereDate('tgl_pendaftaran', today())->count();
            $totalPembayaran = Pembayaransantri::sum('jumlah_pembayaran');
            $transaksiHariIni = Pembayaransantri::whereDate('tanggal_pembayaran', today())->count();
            
            $recentPendaftar = PendaftaranSantri::latest('tgl_pendaftaran')->take(10)->get();
            
            return view('backend.v_beranda.index', [
                'judul' => 'Dashboard Admin PPDB',
                'role' => 'admin',
                'totalPendaftar' => $totalPendaftar,
                'pendaftarHariIni' => $pendaftarHariIni,
                'totalPembayaran' => $totalPembayaran,
                'transaksiHariIni' => $transaksiHariIni,
                'recentPendaftar' => $recentPendaftar,
            ]);
        } else {
            // Dashboard Pendaftar
            $pendaftaranUser = PendaftaranSantri::where('id_user', $user->id_user)->first();
            $pembayaranUser = $pendaftaranUser ? Pembayaransantri::where('id_santri', $pendaftaranUser->id_santri)->first() : null;
            
            return view('backend.v_beranda.index', [
                'judul' => 'Dashboard Pendaftar',
                'role' => 'pendaftar',
                'pendaftaran' => $pendaftaranUser,
                'pembayaran' => $pembayaranUser,
                'user' => $user,
            ]);
        }
    }
}
