@extends('backend.v_layout.app')
@section('content')
<!-- contentAwal -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $judul }}</h5>
                </div>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id Siswa</th>
                                <th>Tanggal Pendaftaran</th>
                                <th>Nama Siswa</th>
                                <th>Tempat Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>No NISN</th>
                                <th>No NIK</th>
                                <th>No Telpon</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->id_santri }}</td>
                                <td>{{ $row->tgl_pendaftaran }}</td>
                                <td>{{ $row->nama_santri }}</td>
                                <td>{{ $row->tempat_tanggal_lahir }}</td>
                                <td>{{ $row->jenis_kelamin }}</td>
                                <td>{{ $row->no_nisn }}</td>
                                <td>{{ $row->no_nik }}</td>
                                <td>{{ $row->no_telpon }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('backend.pendaftaransantri.export.pdf') }}" class="btn btn-danger">
                        <i class="fas fa-file-pdf"></i> Unduh PDF
                    </a>
                </div>

                {{-- Jika pagination digunakan --}}
                {{-- {{ $index->links() }} --}}

            </div>
        </div>
    </div>
</div>
<!-- contentAkhir -->
@endsection