<?php

namespace App\Http\Controllers;

use App\Models\PendaftaranSantri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;


class PendaftaranSantriController extends Controller
{
    private function ensureAdmin(): void
    {
        abort_unless(Auth::check() && Auth::user()->role === 'admin_ppdb', 403);
    }

//index
    public function index()
    {
        $this->ensureAdmin();
        $PendaftaranSantri = PendaftaranSantri::orderBy('nama_santri', 'desc')->paginate(10);
        return view('backend.v_pendaftaransantri.index', [
            'judul' => 'Pendaftaran Siswa',
            'index' => $PendaftaranSantri,
        ]);
    }

    public function pemilik()
    {
        $this->ensureAdmin();
        $PendaftaranSantri = PendaftaranSantri::orderBy('nama_santri', 'desc')->paginate(10);
        return view('backend.pemilik.data', [
            'judul' => 'Pendaftaran Siswa',
            'data' => $PendaftaranSantri,
        ]);
    }

//create
    public function create()
    {
        $PendaftaranSantri = PendaftaranSantri::orderBy('id_santri', 'asc')->get();
        return view('backend.v_pendaftaransantri.create', [
            'judul' => 'Form Pendaftaran PPDB',
            'create' => $PendaftaranSantri,
            'id_santri_default' => $this->generateIdSantri(),
            'id_user_default' => Auth::check() ? Auth::user()->id_user : '',
            'tgl_pendaftaran_default' => now()->format('Y-m-d'),
        ]);
    }

    private function generateIdSantri(): string
    {
        return 'PS-' . now()->format('YmdHis') . '-' . Str::upper(Str::random(4));
    }

    private function handleUpload(Request $request, string $fieldName, ?string $oldPath = null): ?string
    {
        if (!$request->hasFile($fieldName)) {
            return $oldPath;
        }

        $directory = public_path('uploads/pendaftaran');
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

        return 'uploads/pendaftaran/' . $filename;
    }


    public function exportPDF()
{
    $this->ensureAdmin();
    $data = PendaftaranSantri::all();
    $pdf = Pdf::loadView('backend.exports.pendaftaran_pdf', compact('data'));
    return $pdf->download('pendaftaran_siswa.pdf');
}


//store
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_santri' => 'nullable|string|max:255',
            'id_user'=>'nullable|string|max:255',
            'tgl_pendaftaran' => 'nullable|string|max:255',
            'nama_santri' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'agama' => 'required|string|max:100',
            'alamat_lengkap' => 'required|string',
            'rt_rw' => 'required|string|max:20',
            'desa_kelurahan' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kota_kabupaten' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kode_pos' => 'required|digits_between:5,10',
            'no_hp_siswa' => 'required|digits_between:10,15|unique:pendaftaransantri,no_hp_siswa',
            'email' => 'required|email|unique:pendaftaransantri,email',
            'no_nisn' => 'required|digits:10|unique:pendaftaransantri,no_nisn',
            'no_nik' => 'nullable|digits:16|unique:pendaftaransantri,no_nik',

            'nama_ayah' => 'required|string|max:255',
            'nik_ayah' => 'required|digits:16',
            'pekerjaan_ayah' => 'required|string|max:255',
            'penghasilan_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'nik_ibu' => 'required|digits:16',
            'pekerjaan_ibu' => 'required|string|max:255',
            'penghasilan_ibu' => 'required|string|max:255',
            'nama_wali' => 'nullable|string|max:255',
            'pekerjaan_wali' => 'nullable|string|max:255',
            'no_hp_wali' => 'nullable|digits_between:10,15',

            'nama_sekolah_asal' => 'required|string|max:255',
            'npsn' => 'required|digits:8',
            'alamat_sekolah' => 'required|string',
            'tahun_lulus' => 'required|digits:4',

            'pilihan_jurusan_1' => 'required|string|max:100',
            'pilihan_jurusan_2' => 'required|string|max:100|different:pilihan_jurusan_1',
            'pilihan_jurusan_3' => 'required|string|max:100|different:pilihan_jurusan_1|different:pilihan_jurusan_2',
            'pilihan_jurusan_4' => 'required|string|max:100|different:pilihan_jurusan_1|different:pilihan_jurusan_2|different:pilihan_jurusan_3',
            'pilihan_jurusan_5' => 'required|string|max:100|different:pilihan_jurusan_1|different:pilihan_jurusan_2|different:pilihan_jurusan_3|different:pilihan_jurusan_4',

            'pas_foto' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'scan_kk' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'akta_kelahiran' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'ijazah_skl' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'raport' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ],[
            'required' => 'Kolom :attribute wajib diisi.',
            'email' => 'Kolom :attribute harus berupa email yang valid.',
        ]);

        $validatedData['id_santri'] = $validatedData['id_santri'] ?? $this->generateIdSantri();
        $validatedData['id_user'] = Auth::check() ? Auth::user()->id_user : ($validatedData['id_user'] ?? '');
        $validatedData['tgl_pendaftaran'] = $validatedData['tgl_pendaftaran'] ?? now()->format('Y-m-d');
        $validatedData['tempat_tanggal_lahir'] = $validatedData['tempat_lahir'] . ', ' . $validatedData['tanggal_lahir'];
        $validatedData['no_telpon'] = $validatedData['no_hp_siswa'];
        $validatedData['pas_foto'] = $this->handleUpload($request, 'pas_foto');
        $validatedData['scan_kk'] = $this->handleUpload($request, 'scan_kk');
        $validatedData['akta_kelahiran'] = $this->handleUpload($request, 'akta_kelahiran');
        $validatedData['ijazah_skl'] = $this->handleUpload($request, 'ijazah_skl');
        $validatedData['raport'] = $this->handleUpload($request, 'raport');

        PendaftaranSantri::create($validatedData);
        if (Auth::check() && Auth::user()->role === 'admin_ppdb') {
            return redirect()->route('backend.pendaftaransantri.index')->with('success', 'Data berhasil tersimpan');
        }

        return redirect()->route('backend.pendaftaran.form')->with('success', 'Pendaftaran berhasil disimpan.');
    }

//show
    public function show(string $id)
    {
        //
    }

//edit
    public function edit($id)
    {
        $this->ensureAdmin();
        $edit = PendaftaranSantri::findOrFail($id);
        $judul = "Edit Pendaftaran Siswa";
        return view('backend.v_pendaftaransantri.edit', compact('edit', 'judul'));
    }

//update
    public function update(Request $request, string $id_santri)
    {
        $this->ensureAdmin();
        $PendaftaranSantri = PendaftaranSantri::findOrFail($id_santri);
        $rules = [
            'id_santri' => 'required|string|max:255',
            'tgl_pendaftaran' => 'required|string|max:255',
            'nama_santri' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'agama' => 'required|string|max:100',
            'alamat_lengkap' => 'required|string',
            'rt_rw' => 'required|string|max:20',
            'desa_kelurahan' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kota_kabupaten' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kode_pos' => 'required|digits_between:5,10',
            'no_hp_siswa' => 'required|digits_between:10,15|unique:pendaftaransantri,no_hp_siswa,' . $id_santri . ',id_santri',
            'email' => 'required|email|unique:pendaftaransantri,email,' . $id_santri . ',id_santri',
            'no_nisn' => 'required|digits:10|unique:pendaftaransantri,no_nisn,' . $id_santri . ',id_santri',
            'no_nik' => 'nullable|digits:16|unique:pendaftaransantri,no_nik,' . $id_santri . ',id_santri',

            'nama_ayah' => 'required|string|max:255',
            'nik_ayah' => 'required|digits:16',
            'pekerjaan_ayah' => 'required|string|max:255',
            'penghasilan_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'nik_ibu' => 'required|digits:16',
            'pekerjaan_ibu' => 'required|string|max:255',
            'penghasilan_ibu' => 'required|string|max:255',
            'nama_wali' => 'nullable|string|max:255',
            'pekerjaan_wali' => 'nullable|string|max:255',
            'no_hp_wali' => 'nullable|digits_between:10,15',

            'nama_sekolah_asal' => 'required|string|max:255',
            'npsn' => 'required|digits:8',
            'alamat_sekolah' => 'required|string',
            'tahun_lulus' => 'required|digits:4',

            'pilihan_jurusan_1' => 'required|string|max:100',
            'pilihan_jurusan_2' => 'required|string|max:100|different:pilihan_jurusan_1',
            'pilihan_jurusan_3' => 'required|string|max:100|different:pilihan_jurusan_1|different:pilihan_jurusan_2',
            'pilihan_jurusan_4' => 'required|string|max:100|different:pilihan_jurusan_1|different:pilihan_jurusan_2|different:pilihan_jurusan_3',
            'pilihan_jurusan_5' => 'required|string|max:100|different:pilihan_jurusan_1|different:pilihan_jurusan_2|different:pilihan_jurusan_3|different:pilihan_jurusan_4',

            'pas_foto' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'scan_kk' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'akta_kelahiran' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'ijazah_skl' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'raport' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ];
        $validatedData = $request->validate($rules);

        $validatedData['tempat_tanggal_lahir'] = $validatedData['tempat_lahir'] . ', ' . $validatedData['tanggal_lahir'];
        $validatedData['no_telpon'] = $validatedData['no_hp_siswa'];
        $validatedData['pas_foto'] = $this->handleUpload($request, 'pas_foto', $PendaftaranSantri->pas_foto);
        $validatedData['scan_kk'] = $this->handleUpload($request, 'scan_kk', $PendaftaranSantri->scan_kk);
        $validatedData['akta_kelahiran'] = $this->handleUpload($request, 'akta_kelahiran', $PendaftaranSantri->akta_kelahiran);
        $validatedData['ijazah_skl'] = $this->handleUpload($request, 'ijazah_skl', $PendaftaranSantri->ijazah_skl);
        $validatedData['raport'] = $this->handleUpload($request, 'raport', $PendaftaranSantri->raport);

        $PendaftaranSantri->update($validatedData);
        return redirect()->route('backend.pendaftaransantri.index')->with('success', 'Data berhasil diperbaharui');
    }

//destory
    public function destroy(string $id_santri)
    {
        $this->ensureAdmin();
        $PendaftaranSantri = PendaftaranSantri::findOrFail($id_santri);
        $PendaftaranSantri->delete();
        return redirect()->route('backend.pendaftaransantri.index')->with('success', 'Data berhasil dihapus');
    }
}
