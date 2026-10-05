# Deployment SISALON — Jobsheet 13

## Persyaratan

- PHP dengan ekstensi `pdo_pgsql`.
- PostgreSQL yang dapat diakses aplikasi, misalnya database Supabase project
  SISALON.
- Untuk deployment pada portal proyek ini, Vercel menjalankan aplikasi PHP
  melalui runtime yang dikonfigurasi di `vercel.json`.

## Siapkan database

Jobsheet13 menggunakan skema yang sama dengan SISALON Jobsheet11–12. Jika tabel
dan data sudah tersedia di Supabase, **jangan jalankan ulang seed pada
`01_sisalon.sql`**, sebab file tersebut berisi data contoh saat tabel kosong.
Jalankan hanya `03_transaksi_layanan.sql` jika tabel transaksi belum ada.

Untuk database baru, jalankan ketiga skrip secara berurutan pada database yang
sama:

```sh
psql "host=HOST port=5432 dbname=DATABASE user=USER sslmode=require" -f sql/01_sisalon.sql
psql "host=HOST port=5432 dbname=DATABASE user=USER sslmode=require" -f sql/02_users.sql
psql "host=HOST port=5432 dbname=DATABASE user=USER sslmode=require" -f sql/03_transaksi_layanan.sql
```

Atau jalankan isi file SQL satu per satu melalui SQL Editor Supabase setelah
memilih project SISALON yang benar. Jangan memasukkan password database ke
perintah yang akan disimpan atau dibagikan.

## Konfigurasi lokal

Salin `includes/.env.example` menjadi `includes/.env`, lalu isi detail koneksi
Supabase lokal pada berkas yang diabaikan Git tersebut:

```ini
supabase_host=HOST_POOLER_SUPABASE
supabase_port=5432
supabase_database=postgres
supabase_user=USER_POOLER_SUPABASE
supabase_password=PASSWORD_DATABASE
```

Alternatifnya, sediakan environment variables `SUPABASE_DB_HOST`,
`SUPABASE_DB_PORT`, `SUPABASE_DB_NAME`, `SUPABASE_DB_USER`, dan
`SUPABASE_DB_PASSWORD`. Environment variables memiliki prioritas di atas file
`.env`. Pertahankan SSL database; aplikasi menggunakan `sslmode=require`.

Jalankan server dari direktori `Jobsheet13`:

```sh
php -S localhost:8000
```

Buka `http://localhost:8000/`. Path halaman dan aset dihitung relatif, termasuk
ketika aplikasi diakses melalui subdirektori di portal.

## Deployment pada Vercel portal

1. Atur **Root Directory** project Vercel ke root repository portal, bukan ke
   subfolder Jobsheet13.
2. Pastikan project mengaktifkan environment variables `SUPABASE_DB_HOST`,
   `SUPABASE_DB_PORT`, `SUPABASE_DB_NAME`, `SUPABASE_DB_USER`, dan
   `SUPABASE_DB_PASSWORD` untuk environment deployment yang diperlukan.
3. Deploy branch yang berisi perubahan portal dan Jobsheet13.
4. Buka `/Jobsheet13/` pada domain Vercel portal.
5. Uji halaman, autentikasi, operasi database, dan alur transaksi setelah
   deployment. Vercel memerlukan ekstensi PostgreSQL pada runtime PHP dan
   jaringan yang dapat menjangkau host database.

Jangan commit `includes/.env`, memasukkan kredensial ke kode, atau membagikan
password Supabase. Git mengabaikan berkas `.env`; gunakan Vercel Environment
Variables untuk production.
