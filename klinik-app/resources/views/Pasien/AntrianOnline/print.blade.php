<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Antrian</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        .print-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background: #fff;
        }
        .print-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .print-button {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="print-container">
        <div class="print-header">
            <h2>Antrian Nomor: {{ $antrian->nomor_antrian }}</h2>
        </div>
        <p><strong>Atas Nama:</strong> {{ $antrian->user->name }}</p>
        <p><strong>Keperluan:</strong> {{ $antrian->keperluan }}</p>
        <p><strong>Tanggal Antrian:</strong> {{ $antrian->tanggal_antrian }}</p>
        <p><strong>Deskripsi Singkat:</strong> {{ $antrian->deskripsi_singkat }}</p>
        <div class="print-button">
            <button onclick="window.print()" class="btn btn-primary">Print</button>
            <a href="{{ route('antrian_online.download_pdf', ['id' => $antrian->id]) }}" class="btn btn-secondary">Download PDF</a>
        </div>
    </div>
</body>
</html>
