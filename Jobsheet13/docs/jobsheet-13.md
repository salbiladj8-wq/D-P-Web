# Jobsheet 13 — Deployment & Dokumentasi SISALON

Jobsheet13 adalah snapshot SISALON yang meneruskan fondasi dan fitur dari
Jobsheet11–12: pengelolaan layanan, pelanggan, karyawan, autentikasi petugas,
perlindungan CSRF/XSS, transaksi layanan, penyelesaian layanan, dan riwayat per
pelanggan. Proyek memakai PHP native, PDO_PGSQL, PostgreSQL Supabase, HTML, CSS,
dan JavaScript.

## Entitas dan alur data

- `layanan`: nama, kategori, harga, dan durasi.
- `pelanggan`: identitas dan kontak pelanggan.
- `karyawan`: identitas, jabatan, dan kontak karyawan.
- `users`: akun petugas dengan password hash.
- `transaksi_layanan`: relasi pelanggan, layanan, dan karyawan; snapshot harga
  serta durasi; status `berlangsung` atau `selesai`; waktu mulai dan selesai.

SISALON tidak mengelola stok buku. Transaksi salon menggunakan pemilihan
pelanggan/layanan/karyawan dan penyelesaian layanan sebagai adaptasi alur
peminjaman/pengembalian.

## Role dan hak akses

| Fitur | Tamu | Petugas login |
| --- | --- | --- |
| Beranda dan ringkasan | Lihat | Lihat |
| Daftar layanan, pelanggan, karyawan | Lihat | Lihat |
| Tambah, edit, hapus data master | Tidak | Ya |
| Transaksi baru, layanan berlangsung, riwayat | Tidak | Ya |
| Registrasi, login, logout | Ya | Ya |

## Berkas utama

- `index.php`: ringkasan jumlah layanan, pelanggan, karyawan, dan transaksi
  layanan yang masih berlangsung.
- `layanan/`, `pelanggan/`, `karyawan/`: pengelolaan data master.
- `auth/`: registrasi, login, dan logout petugas.
- `transaksi/`: membuat transaksi, menandai layanan selesai, dan melihat
  riwayat per pelanggan.
- `sql/`: skema database, harus dijalankan pada database SISALON yang sama.
- `docs/deployment.md`: konfigurasi database dan deployment.
- `docs/manual-pengguna.md`: petunjuk penggunaan aplikasi.
- `docs/security-checklist.md`: ringkasan pengamanan aplikasi.

## Menjalankan

Untuk langkah rinci koneksi database dan deployment Vercel, lihat
[`deployment.md`](./deployment.md). Untuk demonstrasi fitur, lihat
[`manual-pengguna.md`](./manual-pengguna.md).

## Skenario uji akhir

1. Buka halaman beranda dan pastikan ringkasan dapat ditampilkan.
2. Sebagai tamu, pastikan halaman daftar dapat dilihat dan akses tambah data
   dialihkan ke login.
3. Daftarkan petugas pertama, login, lalu tambah/ubah data layanan, pelanggan,
   dan karyawan.
4. Buat transaksi layanan. Pastikan transaksi tampil di daftar layanan
   berlangsung dan hitungan beranda bertambah.
5. Selesaikan layanan, lalu pastikan transaksi hilang dari daftar aktif dan
   tercatat berstatus selesai di riwayat pelanggan.
6. Logout dan pastikan halaman transaksi kembali meminta login.

Jangan menyatakan pengujian berhasil sebelum menjalankan skenario tersebut pada
lingkungan yang terhubung ke database yang benar.
