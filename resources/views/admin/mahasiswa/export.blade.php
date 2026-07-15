<!DOCTYPE html>
<html>
<head>
    <title>Export Data Mahasiswa</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Data Mahasiswa Universitas Tiga Serangkai</h2>
    <p>Tanggal Export: {{ date('d F Y') }}</p>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>NIM</th>
                <th>Program Studi</th>
                <th>Email</th>
                <th>Program Magang Saat Ini</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mahasiswa as $index => $mhs)
                @php
                    $mhsData = $mhs->mahasiswa;
                    $registration = $mhsData ? $mhsData->pendaftaran->where('status', 'diterima')->first() : null;
                    $program = $registration ? $registration->programMagang : null;
                @endphp
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $mhs->name }}</td>
                    <td>{{ $mhsData ? $mhsData->nim : '-' }}</td>
                    <td>{{ $mhsData ? $mhsData->prodi : '-' }}</td>
                    <td>{{ $mhs->email }}</td>
                    <td>{{ $program ? $program->nama_program . ' - ' . ($program->mitra->nama_mitra ?? 'Mitra tidak ditemukan') : 'Belum Mengikuti Program' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
