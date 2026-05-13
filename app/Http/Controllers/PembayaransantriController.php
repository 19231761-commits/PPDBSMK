<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaransantri;
use App\Helpers\ImageHelper;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

class PembayaransantriController extends Controller
{

    private function handleUpload(Request $request, string $fieldName, ?string $oldPath = null): ?string
    {
        if (!$request->hasFile($fieldName)) {
            return $oldPath;
        }

        $directory = public_path('uploads/pembayaran');
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        if (!empty($oldPath)) {
            $oldFile = public_path($oldPath);
            if (File::exists($oldFile)) {
                File::delete($oldFile);
            }
        }

        $file = $request->file($fieldName);
        $filename = $fieldName . '_' . time() . '_' . Str::random(6) . '.' . $file->getClientOriginalExtension();
        $file->move($directory, $filename);

        return 'uploads/pembayaran/' . $filename;
    }

//index
    public function index()
    {
        $Pembayaransantri = Pembayaransantri::orderBy('updated_at', 'desc')->get();

        return view('backend.v_pembayaransantri.index', [
            'judul' => 'Pembayaran Siswa',
            'index' => $Pembayaransantri,
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
    public function create(Request $request)
    {
        $Pembayaransantri = Pembayaransantri::orderBy('id_pembayaran', 'asc')->get();
        $paymentMethods = [
            'Transfer Bank BCA' => [
                'label' => 'Bank BCA',
                'noRekening' => '8765432109',
                'atasNama' => 'SMK SEHATI KARAWANG',
            ],
            'Transfer Bank BRI' => [
                'label' => 'Bank BRI',
                'noRekening' => '5432178901',
                'atasNama' => 'SMK SEHATI KARAWANG',
            ],
            'Transfer Bank BNI' => [
                'label' => 'Bank BNI',
                'noRekening' => '7654321098',
                'atasNama' => 'SMK SEHATI KARAWANG',
            ],
            'Transfer Bank Mandiri' => [
                'label' => 'Bank Mandiri',
                'noRekening' => '9876543210',
                'atasNama' => 'SMK SEHATI KARAWANG',
            ],
            'E-Wallet DANA' => [
                'label' => 'E-Wallet DANA',
                'noRekening' => '082211445533',
                'atasNama' => 'SMK SEHATI KARAWANG',
            ],
            'E-Wallet GoPay' => [
                'label' => 'E-Wallet GoPay',
                'noRekening' => '082211445533',
                'atasNama' => 'SMK SEHATI KARAWANG',
            ],
            'E-Wallet OVO' => [
                'label' => 'E-Wallet OVO',
                'noRekening' => '082211445533',
                'atasNama' => 'SMK SEHATI KARAWANG',
            ],
            'E-Wallet ShopeePay' => [
                'label' => 'E-Wallet ShopeePay',
                'noRekening' => '082211445533',
                'atasNama' => 'SMK SEHATI KARAWANG',
            ],
        ];
        $paymentTypes = [
            'Semua Pembayaran' => [
                'label' => 'Total Semua Pembayaran',
                'price' => 2000000,
                'description' => '',
            ],
        ];
        $jurusanOptions = [
            'Teknik Komputer dan Jaringan',
            'Rekayasa Perangkat Lunak',
            'Akuntansi dan Keuangan Lembaga',
            'Bisnis Daring dan Pemasaran',
            'Multimedia',
        ];
        $selectedJenisPembayaran = $request->query('jenis_pembayaran');

        if (!array_key_exists($selectedJenisPembayaran, $paymentTypes)) {
            $selectedJenisPembayaran = '';
        }

        $idPembayaranDefault = 'BYR-' . now()->format('YmdHis') . '-' . Str::upper(Str::random(4));

        return view('backend.v_pembayaransantri.create', [
            'judul' => 'Tambah Pembayaran Siswa',
            'Datasantri' => $Pembayaransantri,
            'paymentMethods' => $paymentMethods,
            'paymentTypes' => $paymentTypes,
            'jurusanOptions' => $jurusanOptions,
            'selectedJenisPembayaran' => $selectedJenisPembayaran,
            'defaultJumlahPembayaran' => $paymentTypes[$selectedJenisPembayaran]['price'] ?? null,
            'idPembayaranDefault' => $idPembayaranDefault,
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
        $paymentTypes = [
            'Semua Pembayaran',
        ];

        $validatedData = $request->validate([
            'id_pembayaran' => 'nullable|string|max:255',
            'id_santri' => 'nullable|string|max:255',
            'jenis_pembayaran' => 'required|in:' . implode(',', $paymentTypes),
            'nama_santri' => 'required',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'jurusan' => 'required|string|max:120',
            'atas_nama' => 'nullable|string|max:255',
            'nama_bank' => 'required',
            'jumlah_pembayaran' => 'required|numeric|min:0',
            'bukti_pembayaran' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ],[
            'required' => 'Kolom :attribute wajib diisi.',
            'email' => 'Kolom :attribute harus berupa email yang valid.',
        ]);

        if ($validatedData['jenis_pembayaran'] === 'Semua Pembayaran') {
            $validatedData['jumlah_pembayaran'] = 2000000;
        }

        $validatedData['tanggal_pembayaran'] = now()->format('Y-m-d H:i:s');

        $validatedData['id_pembayaran'] = $validatedData['id_pembayaran'] ?: 'BYR-' . now()->format('YmdHis') . '-' . Str::upper(Str::random(4));
        $validatedData['id_santri'] = $validatedData['id_santri'] ?: 'SAN-' . now()->format('YmdHis') . '-' . Str::upper(Str::random(4));
        $validatedData['atas_nama'] = $validatedData['atas_nama'] ?: $validatedData['nama_santri'];

        $validatedData['bukti_pembayaran'] = $this->handleUpload($request, 'bukti_pembayaran');
        $validatedData['status_pembayaran'] = 'Belum Lunas';
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
        $edit = Pembayaransantri::findOrFail($id);
        $judul = "Edit Data Pembayaran Siswa";
        
        $paymentMethods = [
            'Transfer Bank BCA' => [
                'label' => 'Bank BCA',
                'noRekening' => '8765432109',
                'atasNama' => 'SMK SEHATI KARAWANG',
            ],
            'Transfer Bank BRI' => [
                'label' => 'Bank BRI',
                'noRekening' => '5432178901',
                'atasNama' => 'SMK SEHATI KARAWANG',
            ],
            'Transfer Bank BNI' => [
                'label' => 'Bank BNI',
                'noRekening' => '7654321098',
                'atasNama' => 'SMK SEHATI KARAWANG',
            ],
            'Transfer Bank Mandiri' => [
                'label' => 'Bank Mandiri',
                'noRekening' => '9876543210',
                'atasNama' => 'SMK SEHATI KARAWANG',
            ],
            'E-Wallet DANA' => [
                'label' => 'E-Wallet DANA',
                'noRekening' => '082211445533',
                'atasNama' => 'SMK SEHATI KARAWANG',
            ],
            'E-Wallet GoPay' => [
                'label' => 'E-Wallet GoPay',
                'noRekening' => '082211445533',
                'atasNama' => 'SMK SEHATI KARAWANG',
            ],
            'E-Wallet OVO' => [
                'label' => 'E-Wallet OVO',
                'noRekening' => '082211445533',
                'atasNama' => 'SMK SEHATI KARAWANG',
            ],
            'E-Wallet ShopeePay' => [
                'label' => 'E-Wallet ShopeePay',
                'noRekening' => '082211445533',
                'atasNama' => 'SMK SEHATI KARAWANG',
            ],
        ];

        return view('backend.v_pembayaransantri.edit', compact('edit', 'judul', 'paymentMethods'));
    }
    
//update
    public function update(Request $request, string $id)
    {  
        $Pembayaransantri = Pembayaransantri::findOrFail($id);
        $paymentTypes = [
            'Semua Pembayaran',
        ];

        $rules = [
            'id_pembayaran' => 'nullable|string|max:255',
            'id_santri' => 'nullable|string|max:255',
            'jenis_pembayaran' => 'required|in:' . implode(',', $paymentTypes),
            'nama_santri' => 'required',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'jurusan' => 'required|string|max:120',
            'atas_nama' => 'nullable|string|max:255',
            'nama_bank' => 'required',
            'jumlah_pembayaran' => 'required|numeric|min:0',
            'bukti_pembayaran' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ];
        $validatedData = $request->validate($rules);

        if ($validatedData['jenis_pembayaran'] === 'Semua Pembayaran') {
            $validatedData['jumlah_pembayaran'] = 2000000;
        }

        $validatedData['tanggal_pembayaran'] = $Pembayaransantri->tanggal_pembayaran;

        $validatedData['id_pembayaran'] = $validatedData['id_pembayaran'] ?: $Pembayaransantri->id_pembayaran;
        $validatedData['id_santri'] = $validatedData['id_santri'] ?: $Pembayaransantri->id_santri;
        $validatedData['atas_nama'] = $validatedData['atas_nama'] ?: $validatedData['nama_santri'];

        $validatedData['bukti_pembayaran'] = $this->handleUpload($request, 'bukti_pembayaran', $Pembayaransantri->bukti_pembayaran ?? null);

        if (!isset($validatedData['status_pembayaran'])) {
            $validatedData['status_pembayaran'] = $Pembayaransantri->status_pembayaran ?? 'Belum Lunas';
        }
        $Pembayaransantri->update($validatedData);
        return redirect()->route('backend.pembayaransantri.index')->with('success', 'Data berhasil diperbaharui');
    }  

    public function bayar(string $id)
    {
        $pembayaran = Pembayaransantri::findOrFail($id);
        $pembayaran->update([
            'status_pembayaran' => 'Lunas',
            'tanggal_pembayaran' => now()->format('Y-m-d H:i:s'),
        ]);

        return redirect()->route('backend.pembayaransantri.index')->with('success', 'Pembayaran berhasil ditandai lunas.');
    }

    //distory
    public function destroy($id)
    {
        $Pembayaransantri = Pembayaransantri::findOrFail($id);
        $Pembayaransantri->delete();
        return redirect()->route('backend.pembayaransantri.index')->with('success', 'Data berhasil dihapus');
    }
}