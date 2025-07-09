<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pencarian Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h3>Pencarian Buku</h3>
        <form action="" method="get" class="form-inline mb-3">
            <input type="text" name="q" class="form-control mr-2" placeholder="Judul/Pengarang/Penerbit" value="<?php echo htmlspecialchars($keyword); ?>" required>
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>
        <?php if ($keyword && empty($hasil)): ?>
            <div class="alert alert-warning">Buku tidak ditemukan.</div>
        <?php endif; ?>
        <?php if (!empty($hasil)): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($hasil as $b): ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $b['title']; ?></td>
                            <td><?php echo $b['pengarang']; ?></td>
                            <td><?php echo $b['penerbit']; ?></td>
                            <td><?php echo $b['tahun_buku']; ?></td>
                            <td><?php echo $b['jumlah']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>

</html>