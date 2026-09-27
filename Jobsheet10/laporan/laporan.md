# Laporan Jobsheet 10 - Autentikasi dan Manajemen Sesi SISALON

## Tujuan

Menambahkan autentikasi petugas dan membatasi akses fitur perubahan data pada aplikasi SISALON dari Jobsheet 9.

## Database

Jobsheet 10 memakai tabel `layanan`, `pelanggan`, dan `karyawan` dari database SISALON yang sama. Jalankan skema berikut pada database PostgreSQL tersebut:

```sh
psql "host=<host> port=5432 dbname=<database> user=<user> sslmode=require" -f sql/01_sisalon.sql
psql "host=<host> port=5432 dbname=<database> user=<user> sslmode=require" -f sql/02_users.sql
```

Jalankan kedua file pada database PostgreSQL yang sama dengan koneksi Jobsheet10. `01_sisalon.sql` membuat tabel dan data contoh hanya jika tabel masih kosong; `02_users.sql` menambahkan tabel akun. Akun baru mendapat role `petugas`.

Koneksi aplikasi membaca `SUPABASE_DB_HOST`, `SUPABASE_DB_PORT`, `SUPABASE_DB_NAME`, `SUPABASE_DB_USER`, dan `SUPABASE_DB_PASSWORD` dari environment. Untuk lokal, file `Jobsheet new/includes/.env` yang diabaikan Git dapat memakai key `supabase_host`, `supabase_port`, `supabase_database`, `supabase_user`, dan `supabase_password`. Di Vercel, atur variabel environment tersebut pada project settings untuk environment Production, Preview, dan Development sesuai kebutuhan. Jangan commit file `.env` atau menaruh password database di kode.

## Implementasi

- `auth/register.php` dan `auth/proses_register.php` membuat akun; password diproses dengan `password_hash()` dan username duplikat ditolak.
- `auth/login.php` dan `auth/proses_login.php` memeriksa kredensial dengan `password_verify()` dan menyimpan identitas petugas di session.
- `auth/logout.php` mengosongkan session dan memanggil `session_destroy()`.
- `includes/auth.php` mengarahkan pengguna yang belum login ke halaman Login sebelum halaman mutasi menghasilkan output atau mengakses database.
- Form tambah/edit, handler proses, dan endpoint hapus untuk layanan, pelanggan, serta karyawan memerlukan login.
- Beranda dan halaman daftar tetap publik. Navbar menampilkan nama petugas dan Logout saat login, atau Login dan Register saat belum login.
- Role disimpan di session, tetapi pembatasan fitur berdasarkan role belum diterapkan.

## Cara Menjalankan dan Menguji

1. Dari folder Jobsheet 10, jalankan `php -S localhost:8000`.
2. Akses `/layanan/tambah.php` tanpa login dan pastikan dialihkan ke Login.
3. Daftarkan akun dengan username baru, lalu coba daftar lagi dengan username yang sama dan pastikan ditolak.
4. Login dengan password benar, pastikan nama tampil di navbar, lalu coba tambah, edit, dan hapus data.
5. Logout, lalu pastikan halaman perubahan data kembali mengalihkan ke Login.
6. Pastikan beranda dan halaman daftar tetap dapat dibuka tanpa login.

## Kesimpulan

Jobsheet 10 menambahkan registrasi, login, logout, dan perlindungan session pada operasi perubahan data SISALON tanpa mengunci halaman beranda maupun daftar.