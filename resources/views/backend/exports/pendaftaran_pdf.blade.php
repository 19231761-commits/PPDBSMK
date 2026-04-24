<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }
        th {
            background-color: #006400; /* Hijau tua */
            color: white;
        }
        h3, .alamat {
            text-align: center;
            margin: 0;
        }
        .logo {
            text-align: center;
            margin-bottom: 10px;
        }
        .logo img {
            height: 80px;
        }
    </style>
</head>
<body>
    <div class="logo">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend/images/logoo.jpg') }}">
    </div>
    <h3>Data Pendaftaran PPDB</h3>
    <p class="alamat">SMK Sehati Karawang</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Pendaftaran</th>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Tempat Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>NISN</th>
                <th>NIK</th>
                <th>No Telp</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $row->id_pendaftaran }}</td>
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
</body>
</html>