<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Denda</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h3>Data Denda</h3>
        <?php $this->load->view('layout/notifikasi'); ?>
        <form action="" method="post" class="form-inline mb-3">
            <input type="number" name="denda" class="form-control mr-2" placeholder="Harga Denda" required>
            <select name="status" class="form-control mr-2" required>
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
            </select>
            <input type="date" name="mulai_tanggal" class="form-control mr-2" required>
            <button type="submit" class="btn btn-success">Tambah Denda</button>
        </form>
        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Harga Denda</th>
                    <th>Status</th>
                    <th>Mulai Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($denda as $d): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['denda']; ?></td>
                        <td><?php echo $d['status']; ?></td>
                        <td><?php echo $d['mulai_tanggal']; ?></td>
                        <td>
                            <a href="<?php echo site_url('denda/edit/' . $d['id_denda']); ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="<?php echo site_url('denda/delete/' . $d['id_denda']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>