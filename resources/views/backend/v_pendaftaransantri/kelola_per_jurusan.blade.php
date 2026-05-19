@extends('backend.v_layout.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card soft-card mb-4">
                <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                    <div>
                        <div class="text-uppercase text-primary font-weight-bold mb-2" style="letter-spacing: 0.06em; font-size: 12px;">Manajemen Pendaftaran</div>
                        <h4 class="card-title mb-2">{{ $judul }}</h4>
                        <p class="mb-0 text-muted">Lihat daftar siswa yang telah mengisi formulir pendaftaran terorganisir per jurusan pilihan.</p>
                    </div>
                    <div class="mt-3 mt-md-0">
                        <a href="{{ route('backend.pendaftaransantri.index') }}" class="btn btn-outline-purple mb-2 mb-md-0">
                            <i class="fas fa-list"></i> Lihat Semua Data
                        </a>
                    </div>
                </div>
            </div>

            @if($dataPerJurusan->isEmpty())
                <div class="card soft-card">
                    <div class="card-body text-center py-5">
                        <i class="fas fa-inbox" style="font-size: 48px; color: #d1d5db; margin-bottom: 16px; display: block;"></i>
                        <h5 class="text-muted">Belum ada data pendaftaran</h5>
                        <p class="text-muted small">Data pendaftaran siswa akan ditampilkan di sini setelah siswa mengisi formulir pendaftaran.</p>
                    </div>
                </div>
            @else
                <!-- Filter Jurusan -->
                <div class="card soft-card mb-4">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-6">
                                <label class="font-weight-bold text-muted" style="font-size: 13px; letter-spacing: 0.05em;">FILTER BERDASARKAN JURUSAN</label>
                            </div>
                            <div class="col-12 col-md-6">
                                <select id="filterJurusan" class="form-control" style="border-color: #d1d5db;">
                                    <option value="">-- Semua Jurusan --</option>
                                    @foreach($dataPerJurusan as $jurusan => $siswa)
                                        <option value="{{ $jurusan }}">{{ $jurusan }} ({{ $siswa->count() }} siswa)</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion" id="accordionJurusan">
                    @foreach($dataPerJurusan as $jurusan => $siswa)
                        <div class="card soft-card mb-3 jurusan-card">
                            <span class="jurusan-name-hidden" style="display:none;">{{ $jurusan }}</span>
                            <div class="card-header p-0" id="heading{{ $loop->iteration }}">
                                <button class="btn btn-link btn-block text-left p-4" type="button" data-toggle="collapse" data-target="#collapse{{ $loop->iteration }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="collapse{{ $loop->iteration }}">
                                    <div class="d-flex justify-content-between align-items-center w-100">
                                        <div>
                                            <h5 class="mb-1">{{ $jurusan }}</h5>
                                            <small class="text-muted">{{ $siswa->count() }} siswa terdaftar</small>
                                        </div>
                                        <span class="badge badge-purple badge-pill" style="font-size: 16px; padding: 6px 12px;">{{ $siswa->count() }}</span>
                                    </div>
                                </button>
                            </div>

                            <div id="collapse{{ $loop->iteration }}" class="collapse {{ $loop->first ? 'show' : '' }}" aria-labelledby="heading{{ $loop->iteration }}" data-parent="#accordionJurusan">
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr style="background-color: #f9fafb;">
                                                    <th style="width: 5%;">No</th>
                                                    <th style="width: 15%;">ID Siswa</th>
                                                    <th style="width: 20%;">Nama Siswa</th>
                                                    <th style="width: 15%;">NISN</th>
                                                    <th style="width: 15%;">No HP</th>
                                                    <th style="width: 15%;">Email</th>
                                                    <th style="width: 10%;">Status</th>
                                                    <th style="width: 10%; text-align: center;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($siswa as $row)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td><span class="badge badge-light-purple">{{ $row->id_santri }}</span></td>
                                                        <td>
                                                            <div style="font-weight: 600; color: #1f2937;">{{ $row->nama_santri }}</div>
                                                            <small class="text-muted">{{ $row->nama_sekolah_asal }}</small>
                                                        </td>
                                                        <td>{{ $row->no_nisn ?? '-' }}</td>
                                                        <td>{{ $row->no_hp_siswa ?? '-' }}</td>
                                                        <td>
                                                            <a href="mailto:{{ $row->email }}" title="Kirim email">{{ $row->email ?? '-' }}</a>
                                                        </td>
                                                        <td>
                                                            @php
                                                                $isComplete = $row->pas_foto && $row->scan_kk && $row->akta_kelahiran && $row->ijazah_skl;
                                                            @endphp
                                                            @if($isComplete)
                                                                <span class="badge badge-success px-2 py-1">
                                                                    <i class="fas fa-check-circle"></i> Lengkap
                                                                </span>
                                                            @else
                                                                <span class="badge badge-warning text-dark px-2 py-1">
                                                                    <i class="fas fa-exclamation-circle"></i> Belum Lengkap
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="{{ route('backend.pendaftaransantri.edit', $row->id_santri) }}" class="btn btn-sm btn-icon btn-purple" title="Edit Data">
                                                                <i class="far fa-edit"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="8" class="text-center text-muted py-4">Tidak ada data siswa untuk jurusan ini</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    .badge-light-purple {
        background-color: #ede9fe;
        color: #7c3aed;
        font-weight: 600;
    }

    .badge-purple {
        background-color: #7c3aed;
        color: white;
    }

    .soft-card {
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    }

    .btn-icon {
        width: 36px;
        height: 36px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0;
    }

    .card-header {
        background-color: #f9fafb;
        border-bottom: 1px solid #e5e7eb;
    }

    .btn-link {
        color: inherit !important;
        text-decoration: none !important;
        transition: background-color 0.2s ease;
    }

    .btn-link:hover {
        background-color: #f3f4f6;
    }

    .btn-link[aria-expanded="true"] {
        background-color: #f0f4ff;
    }

    .table-hover tbody tr:hover {
        background-color: #f9fafb;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterJurusanSelect = document.getElementById('filterJurusan');
        const jurusanCards = document.querySelectorAll('.jurusan-card');
        const urlParams = new URLSearchParams(window.location.search);
        const jurusanFromUrl = urlParams.get('jurusan');

        // Function to filter cards
        function filterCards(selectedValue) {
            jurusanCards.forEach(card => {
                const jurusanName = card.querySelector('.jurusan-name-hidden').textContent;
                if (selectedValue === '' || selectedValue === jurusanName) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        // Set initial filter based on URL parameter
        if (jurusanFromUrl) {
            filterJurusanSelect.value = jurusanFromUrl;
            filterCards(jurusanFromUrl);
        }

        // Filter functionality on change
        filterJurusanSelect.addEventListener('change', function() {
            const selectedValue = this.value;
            filterCards(selectedValue);
            
            // Update URL without reloading
            const newUrl = window.location.pathname + (selectedValue ? '?jurusan=' + encodeURIComponent(selectedValue) : '');
            window.history.pushState({path: newUrl}, '', newUrl);
        });

        // Tambah konfirmasi delete jika ada button delete
        const confirmButtons = document.querySelectorAll('.show_confirm');
        confirmButtons.forEach(btn => {
            btn.addEventListener('click', function(e) {
                const name = this.getAttribute('data-konf-delete');
                if (!confirm(`Yakin ingin menghapus data ${name}?`)) {
                    e.preventDefault();
                }
            });
        });
    });
</script>
@endsection
