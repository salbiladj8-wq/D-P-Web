# Jobsheet 12 — Integrasi Modul Transaksi SISALON

Jobsheet12 dibuat sebagai salinan mandiri SISALON Jobsheet11. Data layanan,
pelanggan, karyawan, autentikasi, dan tampilan dasarnya tetap mengikuti
Jobsheet11. Jobsheet11 tidak diubah.

## Penyesuaian fitur

- `sql/03_transaksi_layanan.sql` menambahkan tabel transaksi yang terhubung
  ke pelanggan, layanan, dan karyawan.
- `transaksi/tambah.php` membuat transaksi layanan baru. Harga dan durasi
  layanan disimpan sebagai snapshot agar riwayat tidak berubah saat data layanan
  diperbarui.
- `transaksi/selesai.php` menampilkan transaksi yang masih berlangsung;
  `proses_selesai.php` menandai layanan selesai dalam transaksi database dengan
  penguncian baris untuk mencegah penyelesaian ganda.
- `transaksi/riwayat.php` menampilkan histori transaksi per pelanggan.
- Menu transaksi hanya muncul setelah petugas login. Halaman dan proses transaksi
  juga memerlukan sesi login.
- Beranda menghitung transaksi berstatus `berlangsung`.

SISALON tidak mengelola stok barang pada modul ini. Karena itu, alur pengurangan
dan penambahan stok buku pada Jobsheet12 perpustakaan disesuaikan menjadi
pembuatan dan penyelesaian transaksi layanan.

## Menjalankan

Jalankan skema tambahan pada database PostgreSQL yang sama dengan SISALON:

```sh
psql -d NAMA_DATABASE_SISALON -f sql/03_transaksi_layanan.sql
```

Pastikan skema `layanan`, `pelanggan`, `karyawan`, dan `users` dari Jobsheet11
sudah tersedia. Jalankan server lokal dari folder `Jobsheet12`, misalnya:

```sh
php -S localhost:8000
```

Pada deployment Vercel portal repo, buka `/Jobsheet12/`.

## Alur uji

Register petugas → Login → pilih Transaksi Baru → pilih pelanggan, layanan,
dan karyawan → cek jumlah Layanan Berlangsung di Beranda → tandai Selesaikan
Layanan → pilih pelanggan pada Riwayat Transaksi dan pastikan status transaksi
menjadi Selesai.
