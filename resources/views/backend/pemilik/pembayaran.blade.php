@extends('backend.v_layout.app')
@section('content')
<!-- contentAwal -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"> {{ $judul }} </h5>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id Pembayaran</th>
                                <th>Id Siswa</th>
                                <th>Jenis Pembayaran</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Nama Siswa</th>
                                <th>Atas Nama</th>
                                <th>Nama Bank</th>
                                <th>Jumlah Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pembayaran as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->id_pembayaran }}</td>
                                <td>{{ $row->id_santri }}</td>
                                <td>{{ $row->jenis_pembayaran }}</td>
                                <td>{{ $row->tanggal_pembayaran }}</td>
                                <td>{{ $row->nama_santri }}</td>
                                <td>{{ $row->atas_nama}}</td>
                                <td>{{ $row->nama_bank }}</td>
                                <td>{{ $row->jumlah_pembayaran }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('backend.pembayaransantri.export.pdf') }}" class="btn btn-danger">
                        <i class="fas fa-file-pdf"></i> Unduh PDF
                    </a>
            </div>
        </div>
    </div>
</div>
<!-- contentAkhir -->
@endsection