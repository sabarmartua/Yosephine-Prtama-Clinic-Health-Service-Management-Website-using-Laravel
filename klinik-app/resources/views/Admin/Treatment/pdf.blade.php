<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>PDF Treatment - Klinik Yosephine</title>

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
    </div>
</body>

</html>