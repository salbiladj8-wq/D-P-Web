# Laporan Jobsheet 9 - CRUD Lengkap SISALON

## Tujuan

Melengkapi aplikasi SISALON dari Jobsheet New dengan pencarian server-side, pagination, dan penghapusan data yang hanya menerima POST.

## Data dan Koneksi

Jobsheet 9 memakai tabel `layanan`, `pelanggan`, dan `karyawan` beserta data awal yang sudah ada di database Supabase Jobsheet New. File `includes/koneksi.php` memanggil koneksi yang sama, sehingga perubahan tidak disimpan ke database baru.

## Implementasi

- Setiap modul mempertahankan fitur tambah, daftar, ubah, dan hapus yang berasal dari Jobsheet New.
- Daftar layanan mencari berdasarkan `nama_layanan`; pelanggan dan karyawan mencari berdasarkan `nama` menggunakan `ILIKE`.
- Hasil daftar dibatasi lima baris dengan `LIMIT` dan `OFFSET`. Navigasi halaman mempertahankan kata kunci pencarian.
- Tombol hapus menggunakan form `method="post"` dan dikonfirmasi saat event `submit`.
- Endpoint `hapus.php` memeriksa metode request dan mengembalikan status 405 untuk request selain POST.
- Semua query pencarian, perubahan, dan penghapusan menggunakan prepared statements PDO.
- Route Vercel mengarahkan URL Jobsheet9 ke PHP gateway proyek.

## Pengujian Alur

1. Buka Jobsheet 9 dan pastikan ringkasan menampilkan jumlah layanan, pelanggan, dan karyawan.
2. Tambahkan data lalu pastikan data tampil pada daftar.
3. Ubah data dan pastikan perubahan tersimpan.
4. Cari nama yang ada dan telusuri halaman hasil.
5. Batalkan konfirmasi hapus untuk memastikan data tetap ada, lalu konfirmasi hapus dan pastikan data hilang.
6. Akses endpoint `hapus.php` melalui GET dan pastikan server mengembalikan status 405.

## Kesimpulan

Jobsheet 9 meneruskan data SISALON yang sama dari Jobsheet New, sekaligus menambahkan pencarian lintas halaman, pagination lima data, dan penghapusan yang hanya dapat dipicu melalui POST.