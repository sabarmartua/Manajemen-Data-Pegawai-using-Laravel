<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">PegawaiApp</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('agama.index') }}">Agama</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('jabatan.index') }}">Jabatan</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('golongan.index') }}">Golongan</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('eselon.index') }}">Eselon</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('unit_kerja.index') }}">Unit Kerja</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('pegawai.index') }}">Pegawai</a></li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Selamat datang, {{ Auth::user()->name }}!</h1>
        <p>Ini adalah dashboard aplikasi manajemen pegawai.</p>

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Pegawai</h5>
                        <p class="card-text">Kelola data pegawai, tambah, edit, hapus, dan cetak CSV.</p>
                        <a href="{{ route('pegawai.index') }}" class="btn btn-light">Kelola Pegawai</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Unit Kerja</h5>
                        <p class="card-text">Lihat struktur organisasi dan unit kerja.</p>
                        <a href="{{ route('unit_kerja.index') }}" class="btn btn-light">Lihat Unit Kerja</a>
                    </div>
                </div>
            </div>
            <!-- Tambahkan card lain untuk Agama, Jabatan, Golongan, Eselon -->
        </div>
    </div>
</body>

</html>