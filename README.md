# Sistem Informasi Perpustakaan MA Al-Hijrah

Aplikasi web perpustakaan berbasis CodeIgniter 3 untuk manajemen buku, anggota, transaksi peminjaman/pengembalian, denda, dan fitur pendukung lainnya.

## Fitur Utama

- Login multi-level (Admin, Petugas, Anggota)
- Dashboard statistik
- CRUD Data Pengguna (Petugas/Admin)
- CRUD Data Anggota
- CRUD Data Buku (upload sampul & lampiran)
- CRUD Kategori Buku
- CRUD Rak Buku
- Transaksi Peminjaman & Pengembalian Buku
- Manajemen Denda (otomatis & manual)
- Cetak Kartu Anggota (print/PDF)
- Pencarian Buku
- Edit Profil & Ganti Password
- Validasi & Notifikasi
- Responsive Design (Bootstrap 4)

## Cara Instalasi

1. Clone/download repo ini ke folder `htdocs` XAMPP:
   ```
   git clone https://github.com/fakhrioib/WEB-UAS-301220067.git
   ```
2. Import database dari file `database.sql` ke MySQL (phpMyAdmin).
3. Atur koneksi database di `application/config/database.php` (username: root, password: kosong, database: perpustakaan_ma_alhijrah).
4. Jalankan di browser:
   ```
   http://localhost/Perpustakaan/Perpus-MA_AlHijrah/
   ```

## Struktur Folder Utama

- `application/` : Kode utama aplikasi (controllers, models, views)
- `system/` : Core CodeIgniter
- `uploads/` : File upload (foto, sampul, lampiran)
- `database.sql` : File SQL struktur & data awal

## Dokumentasi Fitur

Lihat penjelasan fitur di atas. Setiap menu di sidebar sesuai dengan fitur utama aplikasi.

## Catatan

- Pastikan folder `uploads/` writable.
- Untuk generate PDF, bisa integrasi library mPDF/dompdf jika dibutuhkan.
- Jika ada bug, silakan laporkan via Issues di repo ini.

---

**Finalisasi:**

- Semua fitur sudah diimplementasikan & diuji.
- Siap untuk deployment/penilaian UAS.
