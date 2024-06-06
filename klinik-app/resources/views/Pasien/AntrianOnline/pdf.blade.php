<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Antrian - Klinik Yosephine</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            margin: 20px auto;
            padding: 20px;
            max-width: 800px;
            background-color: #fff;
            border-radius: 8px;
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
            line-height: 1.5;
        }
        .section-title {
            font-size: 18px;
            font-weight: bold;
            color: #007bff;
            margin-top: 20px;
            margin-bottom: 10px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Detail Antrian</h2>
        <p><strong>Nomor Antrian:</strong> {{ $antrian->nomor_antrian }}</p>
        <p><strong>Nama Pasien:</strong> {{ $antrian->user->name }}</p>
        <p><strong>Tanggal Antrian:</strong> {{ $antrian->tanggal_antrian }}</p>
        <p><strong>Keperluan:</strong> {{ $antrian->keperluan }}</p>
        <p><strong>Deskripsi Singkat:</strong> {{ $antrian->deskripsi_singkat }}</p>
    </div>
</body>
</html>
