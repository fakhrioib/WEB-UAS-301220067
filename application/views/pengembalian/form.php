<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Form Pengembalian Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h3>Form Pengembalian Buku</h3>
        <form action="" method="post">
            <div class="form-group">
                <label>No Pinjam</label>
                <input type="text" class="form-control" value="<?php echo $pinjam['pinjam_id']; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" value="<?php echo $pinjam['nama']; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Judul Buku</label>
                <input type="text" class="form-control" value="<?php echo $pinjam['title']; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Tanggal Kembali</label>
                <input type="date" name="tgl_kembali" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
            </div>
            <button type="submit" class="btn btn-success">Proses Pengembalian</button>
            <a href="<?php echo site_url('pengembalian'); ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>

</html>