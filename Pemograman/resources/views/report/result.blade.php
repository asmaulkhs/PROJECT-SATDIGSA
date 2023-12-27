<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>{{ $filename }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>
</head>
<body>
    <div class="container mt-3">
        <h1>Laporan Surat {{ $title }}</h1>
        <p>Periode : {{ $start_date }} s/d {{ $end_date }}</p>
        <p>Jumlah total : <span class="fw-bold fs-4">{{ $suratData->count() }}</span></p>
    
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nomor Surat</th>
                    <th scope="col">Instansi</th>
                    <th scope="col">Pengirim</th>
                    <th scope="col">Pengunjung</th>
                    <th scope="col">Tujuan</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            @foreach ($suratData as $key => $surat)
                <tbody>
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $surat->no_surat }}</td>
                        <td>{{ $surat->instansi }}</td>
                        <td>{{ $surat->pengirim }}</td>
                        <td>{{ $surat->pengunjung }}</td>
                        <td>{{ $surat->tujuan->nama_tujuan }}</td>
                        <td>{{ $surat->waktu }}</td>
                        <td>
                            @if ($surat->tamu)
                                @if ($surat->tamu->datang === 1)
                                    Datang
                                @elseif($surat->tamu->datang === 0)
                                    Tidak Datang
                                @else
                                    Belum Datang
                                @endif
                            @else
                            Ditolak: {{ $surat->penolakan->alasan}}
                            @endif
                        
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>