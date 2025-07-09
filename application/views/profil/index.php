<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Profil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h3>Edit Profil</h3>
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php endif; ?>
        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $user['nama']; ?>" required>
            </div>
            <div class="form-group">
                <label>Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $user['tempat_lahir']; ?>">
            </div>
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" class="form-control" value="<?php echo $user['tgl_lahir']; ?>">
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label><br>
                <select name="jenis_kelamin" class="form-control">
                    <option value="Laki-laki" <?php if ($user['jenis_kelamin'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                    <option value="Perempuan" <?php if ($user['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" value="<?php echo $user['alamat']; ?>">
            </div>
            <div class="form-group">
                <label>Telpon</label>
                <input type="text" name="telpon" class="form-control" value="<?php echo $user['telpon']; ?>">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $user['email']; ?>">
            </div>
            <div class="form-group">
                <label>Foto</label><br>
                <?php if ($user['foto']): ?><img src="<?php echo base_url('uploads/' . $user['foto']); ?>" width="80"><br><?php endif; ?>
                <input type="file" name="foto" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?php echo site_url('profil/password'); ?>" class="btn btn-warning">Ganti Password</a>
        </form>
    </div>
</body>

</html>