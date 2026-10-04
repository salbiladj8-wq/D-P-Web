# Security Checklist Jobsheet 11

## Audit keamanan web dasar

### 1. XSS (Cross-Site Scripting)
- Semua output data dari database dan input pengguna dibungkus dengan `e()`.
- Data seperti nama, alamat, nomor telepon, judul, nama petugas, dan parameter pencarian di-escape saat ditampilkan di halaman HTML.
- Contoh: `<?= e($pelanggan['nama']) ?>` bukan `<?= $pelanggan['nama'] ?>`.

### 2. CSRF (Cross-Site Request Forgery)
- Setiap form POST menambahkan hidden input `csrf_token`.
- Semua endpoint `proses_*.php` dan `hapus.php` memanggil `csrf_verify()` sebelum operasi database.
- Token Csrf disimpan di sesi dan dicek menggunakan `hash_equals()`.

### 3. Session fixation
- Setelah login berhasil, aplikasi memanggil `session_regenerate_id(true)` untuk mencegah fixation session.

### 4. SQL Injection
- Query menggunakan prepared statement (PDO) dan parameter binding.
- Tidak ada perubahan besar karena mulai Jobsheet 8 semua query sudah memakai prepared statement.

### 5. Guard order
- Akses ke endpoint yang memerlukan login diawali dengan `require __DIR__ . '/../includes/auth.php';` sebelum verifikasi CSRF.
- Hal ini memastikan user yang belum login langsung diarahkan ke halaman login.

## Bukti umum sebelum dan sesudah

### Sebelum
- Data ditampilkan langsung tanpa escaping.
- Form POST tidak memiliki token CSRF.
- Koneksi database Jobsheet 11 masih memakai konfigurasi lokal yang berbeda dari Supabase.

### Sesudah
- `includes/helpers.php` menambahkan `e()` untuk escaping.
- `includes/csrf.php` menyediakan `csrf_token()`, `csrf_field()`, dan `csrf_verify()`.
- `includes/koneksi.php` membaca konfigurasi Supabase dari environment variables atau `includes/.env` dan mewajibkan SSL.
- Semua proses keamanan berjalan sesuai requirement jobsheet.

### Konfigurasi database lokal
- Simpan `supabase_host`, `supabase_port`, `supabase_database`, `supabase_user`, dan `supabase_password` di `includes/.env`, atau atur environment variables dengan awalan `SUPABASE_DB_`.
- File `.env` tidak boleh dimasukkan ke Git. Jangan menaruh password di source code atau membagikannya di chat.
- Database Supabase harus memiliki tabel aplikasi SISALON dari file SQL di folder `sql/`.
