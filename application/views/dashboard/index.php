<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Perpus MA Al-Hijrah</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: #f4f6f9;
        }

        .main-header {
            background: #2196f3;
            color: #fff;
            padding: 12px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .main-header .brand {
            font-weight: bold;
            font-size: 22px;
            letter-spacing: 1px;
        }

        .main-header .user-info {
            font-size: 15px;
        }

        .dashboard-row {
            margin-top: 32px;
        }

        .card-stat {
            border: none;
            border-radius: 8px;
            color: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.07);
            margin-bottom: 24px;
            position: relative;
            overflow: hidden;
        }

        .card-stat .icon {
            font-size: 38px;
            opacity: 0.2;
            position: absolute;
            top: 16px;
            right: 16px;
        }

        .card-stat .card-title {
            font-size: 18px;
            font-weight: 500;
        }

        .card-stat .card-value {
            font-size: 32px;
            font-weight: bold;
        }

        .card-stat .more-info {
            color: #fff;
            font-size: 13px;
            text-decoration: underline;
            opacity: 0.8;
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

        .main-footer {
            background: #fff;
            color: #888;
            font-size: 13px;
            padding: 12px 24px;
            border-top: 1px solid #eee;
            margin-top: 40px;
        }

        @media (max-width: 991px) {
            .dashboard-row .col-md-3 {
                margin-bottom: 16px;
            }
        }
    </style>
</head>

<body>
    <div class="main-header">
        <div class="brand">Perpus MA Al-Hijrah</div>
        <div class="user-info">
            Welcome, <?php echo $this->session->userdata('user')['nama']; ?> | <a href="<?php echo site_url('auth/logout'); ?>" class="text-white">Sign out</a>
        </div>
    </div>
    <div class="container-fluid dashboard-row">
        <div class="row">
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card card-stat bg-anggota">
                    <div class="card-body">
                        <div class="card-title">Anggota</div>
                        <div class="card-value"><?php echo $anggota; ?></div>
                        <i class="fa fa-users icon"></i>
                        <a href="#" class="more-info">More info <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card card-stat bg-kategori">
                    <div class="card-body">
                        <div class="card-title">Jenis Buku</div>
                        <div class="card-value"><?php echo $kategori; ?></div>
                        <i class="fa fa-book icon"></i>
                        <a href="#" class="more-info">More info <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card card-stat bg-pinjam">
                    <div class="card-body">
                        <div class="card-title">Pinjam</div>
                        <div class="card-value"><?php echo $pinjam; ?></div>
                        <i class="fa fa-arrow-up-right-dots icon"></i>
                        <a href="#" class="more-info">More info <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card card-stat bg-kembali">
                    <div class="card-body">
                        <div class="card-title">Di Kembalikan</div>
                        <div class="card-value"><?php echo $kembali; ?></div>
                        <i class="fa fa-arrow-rotate-left icon"></i>
                        <a href="#" class="more-info">More info <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-footer text-center">
        Copyright &copy; <?php echo date('Y'); ?> Sistem Informasi Perpustakaan. All rights reserved.
    </div>
</body>

</html>