<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Print Treatment - Klinik Yosephine</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
        }
        p {
            font-size: 16px;
            margin-bottom: 10px;
        }
        .section-title {
            font-size: 18px;
            font-weight: bold;
            color: #007bff;
            margin-top: 20px;
            margin-bottom: 10px;
        }
        ul {
            list-style-type: none;
            padding-left: 0;
        }
        ul li {
            background: #f8f9fa;
            margin-bottom: 5px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .btn-print {
            display: block;
            width: 100px;
            margin: 20px auto;
            text-align: center;
        }
        @media print {
            .btn-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Detail Pengobatan</h2>
        <p><strong>Nama Pasien:</strong> {{ $treatment->nama_pasien }}</p>
        <p><strong>Usia:</strong> {{ $treatment->usia }}</p>
        <p><strong>Alamat:</strong> {{ $treatment->alamat }}</p>
        <p><strong>No HP:</strong> {{ $treatment->no_hp }}</p>
        <p><strong>Keluhan:</strong> {{ $treatment->keluhan }}</p>
        <p><strong>Jenis Pengobatan:</strong> {{ $treatment->jenis_pengobatan }}</p>
        <p><strong>Tanggal Pengobatan:</strong> {{ $treatment->tanggal_pengobatan }}</p>
        <p><strong>Harga Perawatan:</strong> {{ $treatment->harga_perawatan }}</p>
        <p><strong>Harga Obat:</strong> {{ $treatment->harga_obat }}</p>
        <div class="section-title">Obat yang Digunakan:</div>
        <ul>
            @foreach($treatment->obats as $obat)
            <li>{{ $obat->nama }} ({{ $obat->pivot->jumlah_obat }})</li>
            @endforeach
        </ul>
        <button class="btn btn-primary btn-print" onclick="window.print()">Print</button>
    </div>
</body>
</html>
