<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Rak Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h3>Data Rak Buku</h3>
        <?php $this->load->view('layout/notifikasi'); ?>
        <form action="" method="post" class="form-inline mb-3">
            <input type="text" name="nama_rak" class="form-control mr-2" placeholder="Nama Rak" required>
            <button type="submit" class="btn btn-success">Tambah Rak</button>
        </form>
        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Rak Buku</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($rak as $r): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $r['nama_rak']; ?></td>
                        <td>
                            <a href="<?php echo site_url('rak/edit/' . $r['id_rak']); ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="<?php echo site_url('rak/delete/' . $r['id_rak']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>