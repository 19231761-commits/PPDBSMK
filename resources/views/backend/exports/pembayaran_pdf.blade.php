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
    <h3>Data Pembayaran Siswa</h3>
    <p class="alamat">SMK Sehati Karawang</p>

    <table>
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
            @foreach($pembayaran as $row)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $row->id_pembayaran }}</td>
                <td>{{ $row->id_santri }}</td>
                <td>{{ $row->jenis_pembayaran }}</td>
                <td>{{ $row->tanggal_pembayaran }}</td>
                <td>{{ $row->nama_santri }}</td>
                <td>{{ $row->atas_nama }}</td>
                <td>{{ $row->nama_bank }}</td>
                <td>{{ $row->jumlah_pembayaran }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>