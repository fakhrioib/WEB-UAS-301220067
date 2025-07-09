<?php
$level = $this->session->userdata('user')['level'];
?>
<div class="bg-light border-right" id="sidebar-wrapper" style="min-height:100vh;">
    <div class="sidebar-heading font-weight-bold">Perpus MA Al-Hijrah</div>
    <div class="list-group list-group-flush">
        <a href="<?php echo site_url('dashboard'); ?>" class="list-group-item list-group-item-action">Dashboard</a>
        <?php if ($level == 'Petugas'): ?>
            <a href="#" class="list-group-item list-group-item-action">Data Pengguna</a>
            <a href="#" class="list-group-item list-group-item-action">Data Buku</a>
            <a href="#" class="list-group-item list-group-item-action">Kategori</a>
            <a href="#" class="list-group-item list-group-item-action">Rak</a>
            <a href="#" class="list-group-item list-group-item-action">Transaksi</a>
            <a href="#" class="list-group-item list-group-item-action">Denda</a>
        <?php elseif ($level == 'Anggota'): ?>
            <a href="#" class="list-group-item list-group-item-action">Data Peminjaman</a>
            <a href="#" class="list-group-item list-group-item-action">Data Pengembalian</a>
            <a href="#" class="list-group-item list-group-item-action">Cari Buku</a>
            <a href="#" class="list-group-item list-group-item-action">Data Anggota</a>
            <a href="#" class="list-group-item list-group-item-action">Cetak Kartu Anggota</a>
        <?php endif; ?>
    </div>
</div>