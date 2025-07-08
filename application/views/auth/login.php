<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login - Perpustakaan MA Al-Hijrah</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background:#f5f5f5;">
    <div class="container" style="margin-top:100px;max-width:400px;">
        <div class="card">
            <div class="card-body">
                <h4 class="text-center mb-4">Login Perpustakaan</h4>
                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
                <?php endif; ?>
                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                <form action="<?php echo site_url('auth/login'); ?>" method="post">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>