<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { 
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(45deg, #1a535c, #0d2e33);
            min-height: 100vh;
            padding: 20px;
        }
        .page-wrapper {
            margin-top: -70px;
            background: linear-gradient(45deg, #1a535c, #0d2e33);
            min-height: 100vh;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
        }
        .page-breadcrumb {
            width: 100%;
        }
        .page-title {
            font-size: 2rem;
            font-weight: 600;
            margin: 0 auto;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .table {
            border-radius: 10px;
            overflow: hidden;
        }
        th {
            background-color: #1a535c;
            color: white;
            font-weight: 600;
        }
        .btn-primary {
            background: linear-gradient(45deg, #37acbe, #0d2e33);
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(45deg, #0d2e33, #37acbe);
        }
        .signature {
            margin-top: 30px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 10px;
        }
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
    </style>
</head>
<body>
    <div class="page-wrapper">
        <div class="page-breadcrumb d-flex align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="row">
                <div class="col-12 text-center">
                    <h4 class="page-title text-white">Kartu Laporan Hafalan</h4>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row animate__animated animate__fadeInUp">
                <div class="col-12">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p><strong>Nama Santri:</strong> {{ $reportCard->santri->nama }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>NIS:</strong> {{ $reportCard->santri->nis ?? '-' }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>Sekolah:</strong> {{ $reportCard->sekolah }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Surat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($dataHafalan as $item)
                                        <tr>
                                            <td>{{ $item['tanggal'] }}</td>
                                            <td>{{ $item['surat'] }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="signature text-end mt-4">
                                <p class="mb-1"><strong>TTD Pengasuh:</strong></p>
                                <p>{{ $reportCard->ttd_pengasuh }}</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>