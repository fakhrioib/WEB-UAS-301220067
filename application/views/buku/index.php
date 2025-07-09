<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h3>Data Buku</h3>
        <?php $this->load->view('layout/notifikasi'); ?>
        <a href="<?php echo site_url('buku/add'); ?>" class="btn btn-success mb-3">Tambah Buku</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Sampul</th>
                    <th>ISBN</th>
                    <th>Judul</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                    <th>Stok</th>
                    <th>Lampiran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($buku as $b): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php if ($b['sampul']): ?><img src="<?php echo base_url('uploads/' . $b['sampul']); ?>" width="50"><?php endif; ?></td>
                        <td><?php echo $b['isbn']; ?></td>
                        <td><?php echo $b['title']; ?></td>
                        <td><?php echo $b['penerbit']; ?></td>
                        <td><?php echo $b['tahun_buku']; ?></td>
                        <td><?php echo $b['jumlah']; ?></td>
                        <td><?php if ($b['lampiran']): ?><a href="<?php echo base_url('uploads/' . $b['lampiran']); ?>" target="_blank">Lihat</a><?php endif; ?></td>
                        <td>
                            <a href="<?php echo site_url('buku/detail/' . $b['id_buku']); ?>" class="btn btn-info btn-sm">Detail</a>
                            <a href="<?php echo site_url('buku/edit/' . $b['id_buku']); ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="<?php echo site_url('buku/delete/' . $b['id_buku']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>