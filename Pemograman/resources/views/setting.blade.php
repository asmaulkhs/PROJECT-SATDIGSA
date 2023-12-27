<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/setting.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="d-flex my-2">
                    <a  onclick="goBack()" class="text-decoration-none text-white"><span><i class="bi bi-caret-left-fill"></i></span>Kembali</a>

                </div>
                <div class="custom-container shadow">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Informasi Akun</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="fw-medium">Pengguna</th>
                                <th class="text-end fw-light">{{ auth()->user()->nama }}</th>
                            </tr>
                            <tr>
                                <th class="fw-medium">Jabatan</th>
                                <th class="text-end fw-light">{{ auth()->user()->jabatan->nama_jabatan }}</th>
                            </tr>
                            <tr>
                                <th class="fw-medium">Email</th>
                                <th class="text-end fw-light">{{ auth()->user()->email }}</th>
                            </tr>
                            <tr>
                                <th class="fw-medium">Password</th>
                                <th class="text-end fw-light"></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/setting.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>