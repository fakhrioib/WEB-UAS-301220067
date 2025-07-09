<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Pengembalian Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h3>Data Pengembalian Buku</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Pinjam</th>
                    <th>Nama</th>
                    <th>Judul Buku</th>
                    <th>Tgl Pinjam</th>
                    <th>Tgl Kembali</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($pengembalian as $p): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $p['pinjam_id']; ?></td>
                        <td><?php echo $p['nama']; ?></td>
                        <td><?php echo $p['title']; ?></td>
                        <td><?php echo $p['tgl_pinjam']; ?></td>
                        <td><?php echo $p['tgl_kembali']; ?></td>
                        <td><?php echo $p['status']; ?></td>
                        <td>
                            <a href="<?php echo site_url('pengembalian/form/' . $p['id_pinjam']); ?>" class="btn btn-primary btn-sm">Proses Pengembalian</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>