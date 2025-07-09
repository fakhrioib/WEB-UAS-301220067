<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Kartu Anggota</title>
    <style>
        .kartu {
            width: 350px;
            height: 200px;
            border: 2px solid #333;
            border-radius: 10px;
            padding: 20px;
            font-family: Arial, sans-serif;
            background: #f8f8f8;
        }

        .foto {
            float: right;
            width: 80px;
            height: 100px;
            border: 1px solid #aaa;
            object-fit: cover;
        }

        .judul {
            font-weight: bold;
            font-size: 18px;
            color: #2196f3;
        }

        .clear {
            clear: both;
        }
    </style>
</head>

<body onload="window.print()">
    <div class="kartu">
        <div class="judul">Kartu Anggota Perpustakaan</div>
        <img src="<?php echo base_url('uploads/' . ($anggota['foto'] ? $anggota['foto'] : 'default.png')); ?>" class="foto" alt="Foto">
        <p>Nama: <b><?php echo $anggota['nama']; ?></b></p>
        <p>Username: <b><?php echo $anggota['user']; ?></b></p>
        <p>Jenis Kelamin: <?php echo $anggota['jenis_kelamin']; ?></p>
        <p>Alamat: <?php echo $anggota['alamat']; ?></p>
        <div class="clear"></div>
        <div style="font-size:12px; margin-top:20px;">Berlaku selama menjadi anggota perpustakaan</div>
    </div>
</body>

</html>