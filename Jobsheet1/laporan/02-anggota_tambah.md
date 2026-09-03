# Penjelasan `anggota/tambah.html` (Tambah Anggota)

File `tambah.html` yang berada di dalam folder `anggota/` digunakan untuk **menampilkan data anggota** pada sistem SIMPUS-Mini. Halaman ini terdiri dari menu navigasi, tabel data anggota, tombol aksi, dan footer.

## 1.1 Struktur Halaman

Halaman terdiri dari `<header>`, `<main>`, dan `<footer>`. Pada bagian `<header>` terdapat nama aplikasi dan menu navigasi untuk berpindah ke halaman Beranda, Daftar Buku, Daftar Anggota, dan Tambah Anggota.

## 1.2 Tabel Data Anggota

Data anggota ditampilkan menggunakan elemen `<table>` dengan beberapa kolom.

```html
<table>
    <thead>
        <tr>
            <th>No. Anggota</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No. HP</th>
            <th>Aksi</th>
        </tr>
    </thead>
</table>
```

Tabel memiliki lima kolom, yaitu **No. Anggota, Nama, Alamat, No. HP, dan Aksi**. Data anggota yang ditampilkan terdiri dari A001 sampai A007.

## 1.3 Tombol Aksi

Pada setiap data anggota terdapat tombol **Edit** dan **Hapus**.

```html
<button type="button">Edit</button>
<button type="button">Hapus</button>
```

Tombol tersebut digunakan sebagai aksi pada masing-masing data anggota.

## 1.4 Footer

Bagian `<footer>` digunakan sebagai penutup halaman dan menampilkan informasi SIMPUS-Mini serta Jobsheet 1.

```html
<footer>
    <p>&copy; 2026 SIMPUS-Mini &mdash; Jobsheet 1</p>
</footer>
```

## 1.5 Kesimpulan

File `anggota/tambah.html` berisi **tampilan data anggota SIMPUS-Mini dalam bentuk tabel**, dilengkapi menu navigasi, tombol Edit dan Hapus, serta footer.
