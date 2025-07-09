<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Anggota</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h3>Data Anggota</h3>
        <a href="<?php echo site_url('anggota/add'); ?>" class="btn btn-success mb-3">Tambah Anggota</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($anggota as $a): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php if ($a['foto']): ?><img src="<?php echo base_url('uploads/' . $a['foto']); ?>" width="50"><?php endif; ?></td>
                        <td><?php echo $a['user']; ?></td>
                        <td><?php echo $a['nama']; ?></td>
                        <td><?php echo $a['jenis_kelamin']; ?></td>
                        <td>
                            <a href="<?php echo site_url('anggota/detail/' . $a['id_login']); ?>" class="btn btn-info btn-sm">Detail</a>
                            <a href="<?php echo site_url('anggota/edit/' . $a['id_login']); ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="<?php echo site_url('anggota/delete/' . $a['id_login']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>