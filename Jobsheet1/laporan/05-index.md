# Penjelasan `index.html` (Beranda)

File `index.html` merupakan **halaman utama** dari sistem SIMPUS-Mini. Halaman ini menampilkan sambutan, menu navigasi, serta ringkasan data perpustakaan.

## 1.1 Struktur Halaman

Halaman terdiri dari `<header>`, `<main>`, dan `<footer>`. Bagian `<header>` berisi nama aplikasi **SIMPUS-Mini** dan menu navigasi.

```html
<nav>
    <ul>
        <li><a href="index.html">Beranda</a></li>
        <li><a href="buku/list.html">Daftar Buku</a></li>
        <li><a href="buku/tambah.html">Tambah Buku</a></li>
        <li><a href="anggota/list.html">Daftar Anggota</a></li>
    </ul>
</nav>
```

Menu tersebut digunakan untuk berpindah ke halaman Beranda, Daftar Buku, Tambah Buku, dan Daftar Anggota.

## 1.2 Bagian Selamat Datang

Pada bagian `<main>` terdapat informasi pembuka untuk pengguna.

```html
<section>
    <h2>Selamat Datang di Sistem Perpustakaan Mini</h2>
    <p>Aplikasi sederhana untuk mengelola data buku dan anggota perpustakaan.</p>
</section>
```

Bagian ini memberikan penjelasan singkat mengenai fungsi dari SIMPUS-Mini.

## 1.3 Ringkasan Data

Bagian **Ringkasan** menggunakan elemen `<article>` untuk menampilkan jumlah data perpustakaan.

```html
<article>
    <h3>Total Buku</h3>
    <p>12</p>
</article>
```

Terdapat tiga informasi, yaitu **Total Buku sebanyak 12, Total Anggota sebanyak 8, dan Sedang Dipinjam sebanyak 3**.

## 1.4 Footer

Bagian `<footer>` digunakan sebagai penutup halaman.

```html
<footer>
    <p>&copy; 2026 SIMPUS-Mini &mdash; Jobsheet 1</p>
</footer>
```

Footer menampilkan informasi **© 2026 SIMPUS-Mini — Jobsheet 1**.

## 1.5 Kesimpulan

File `index.html` berfungsi sebagai **halaman beranda SIMPUS-Mini** yang menyediakan navigasi dan menampilkan ringkasan informasi mengenai buku, anggota, dan peminjaman perpustakaan.
