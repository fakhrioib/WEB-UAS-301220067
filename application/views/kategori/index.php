<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Kategori Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h3>Data Kategori Buku</h3>
        <?php $this->load->view('layout/notifikasi'); ?>
        <form action="" method="post" class="form-inline mb-3">
            <input type="text" name="kategori_id" class="form-control mr-2" placeholder="Nama Kategori" required>
            <button type="submit" class="btn btn-success">Tambah Kategori</button>
        </form>
        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($kategori as $k): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $k['kategori_id']; ?></td>
                        <td>
                            <a href="<?php echo site_url('kategori/edit/' . $k['id_kategori']); ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="<?php echo site_url('kategori/delete/' . $k['id_kategori']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>