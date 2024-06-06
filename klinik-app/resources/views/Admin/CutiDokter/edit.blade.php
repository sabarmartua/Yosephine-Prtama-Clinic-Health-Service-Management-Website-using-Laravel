<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Edit Cuti Dokter</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/style.css')}}">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Cuti Dokter</h4>
                        </div>
                        <div class="card-body">
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif

                            <form action="{{ route('cuti_dokter.update', $cutiDokter->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="tanggal_mulai">Tanggal Mulai:</label>
                                    <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="{{ $cutiDokter->tanggal_mulai }}">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_berakhir">Tanggal Berakhir:</label>
                                    <input type="date" class="form-control" id="tanggal_berakhir" name="tanggal_berakhir" value="{{ $cutiDokter->tanggal_berakhir }}">
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan:</label>
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{ $cutiDokter->keterangan }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('admin/assets/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/jquery.slimscroll.js')}}"></script>
    <script src="{{ asset('admin/assets/js/Chart.bundle.js')}}"></script>
    <script src="{{ asset('admin/assets/js/chart.js')}}"></script>
    <script src="{{ asset('admin/assets/js/app.js')}}"></script>
</body>

</html>
