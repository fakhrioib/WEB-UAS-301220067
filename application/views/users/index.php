<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Pengguna</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h3>Data Pengguna</h3>
        <?php $this->load->view('layout/notifikasi'); ?>
        <a href="<?php echo site_url('users/add'); ?>" class="btn btn-success mb-3">Tambah Pengguna</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($users as $u): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php if ($u['foto']): ?><img src="<?php echo base_url('uploads/' . $u['foto']); ?>" width="50"><?php endif; ?></td>
                        <td><?php echo $u['user']; ?></td>
                        <td><?php echo $u['nama']; ?></td>
                        <td><?php echo $u['level']; ?></td>
                        <td>
                            <a href="<?php echo site_url('users/detail/' . $u['id_login']); ?>" class="btn btn-info btn-sm">Detail</a>
                            <a href="<?php echo site_url('users/edit/' . $u['id_login']); ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="<?php echo site_url('users/delete/' . $u['id_login']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>