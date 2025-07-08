<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard - Perpus MA Al-Hijrah</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card-stat {
            color: #fff;
            margin-bottom: 20px;
        }

        .bg-anggota {
            background: #00bcd4;
        }

        .bg-kategori {
            background: #2196f3;
        }

        .bg-pinjam {
            background: #4caf50;
        }

        .bg-kembali {
            background: #f44336;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Perpus MA Al-Hijrah</a>
        <div class="ml-auto text-white">
            Welcome, <?php echo $this->session->userdata('user')['nama']; ?> | <a href="<?php echo site_url('auth/logout'); ?>" class="text-white">Sign out</a>
        </div>
    </nav>
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-stat bg-anggota">
                    <div class="card-body">
                        <h5 class="card-title">Anggota</h5>
                        <h2><?php echo $anggota; ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-stat bg-kategori">
                    <div class="card-body">
                        <h5 class="card-title">Jenis Buku</h5>
                        <h2><?php echo $kategori; ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-stat bg-pinjam">
                    <div class="card-body">
                        <h5 class="card-title">Pinjam</h5>
                        <h2><?php echo $pinjam; ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-stat bg-kembali">
                    <div class="card-body">
                        <h5 class="card-title">Di Kembalikan</h5>
                        <h2><?php echo $kembali; ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>