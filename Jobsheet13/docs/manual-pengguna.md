# Manual Pengguna SISALON — Jobsheet 13

## Peran pengguna

Tamu dapat melihat beranda dan daftar data. Petugas harus login untuk mengubah
data atau menggunakan transaksi.

## Registrasi dan login petugas

1. Buka **Register** dari navbar untuk membuat akun petugas pertama.
2. Isi nama, username, dan password, kemudian simpan.
3. Buka **Login** dan masuk dengan username serta password tersebut.
4. Nama petugas dan menu transaksi akan terlihat di navbar setelah berhasil
   login.
5. Gunakan **Logout** setelah selesai.

## Mengelola data salon

1. Buka menu daftar untuk melihat layanan, pelanggan, atau karyawan.
2. Gunakan menu tambah untuk memasukkan data baru.
3. Gunakan aksi edit atau hapus pada baris data untuk memperbarui data.
4. Isi harga layanan dalam rupiah dan durasi dalam menit. Harga tidak boleh
   negatif dan durasi harus lebih dari nol.

## Membuat dan menyelesaikan transaksi layanan

1. Login sebagai petugas, lalu pilih **Transaksi Baru**.
2. Pilih pelanggan, layanan, dan karyawan, kemudian mulai layanan.
3. Buka **Layanan Berlangsung** untuk melihat transaksi aktif.
4. Setelah layanan selesai, pilih **Selesaikan Layanan** pada transaksi yang
   sesuai.
5. Aplikasi menyimpan harga serta durasi saat transaksi dibuat. Perubahan harga
   atau durasi pada data layanan tidak mengubah histori transaksi lama.

## Melihat riwayat transaksi

1. Login dan buka **Riwayat Transaksi**.
2. Pilih pelanggan, lalu tampilkan riwayatnya.
3. Periksa nama layanan/karyawan, waktu mulai/selesai, harga, durasi, dan status.

## Jika terjadi masalah

- **Tidak dapat konek ke database:** pastikan konfigurasi Supabase benar,
  password valid, SSL aktif, dan ekstensi PHP `pdo_pgsql` tersedia.
- **Tabel tidak ditemukan:** pastikan database SISALON yang dipilih benar dan
  skrip SQL sudah dijalankan dalam urutan yang dijelaskan pada
  [`deployment.md`](./deployment.md).
- **Menu transaksi tidak terlihat:** login sebagai petugas terlebih dahulu.
- **Tidak dapat membuat transaksi:** pastikan sudah ada minimal satu pelanggan,
  satu layanan, dan satu karyawan.
