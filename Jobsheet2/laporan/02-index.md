# Penjelasan `index.html` (Beranda)

File `index.html` merupakan **halaman utama** dari sistem SIMPUS-Mini. Halaman ini menampilkan nama aplikasi, menu navigasi, informasi pembuka, serta ringkasan data perpustakaan.

## 1.1 Struktur Halaman

Halaman terdiri dari `<header>`, `<main>`, dan `<footer>`. Bagian `<header>` berisi nama aplikasi **SIMPUS-Mini** dan menu navigasi.

```html
<header>
    <h1>SIMPUS-Mini</h1>
    <nav>
        <ul>
            <li><a href="index.html">Beranda</a></li>
            <li><a href="buku/list.html">Daftar Buku</a></li>
            <li><a href="buku/tambah.html">Tambah Buku</a></li>
            <li><a href="anggota/list.html">Daftar Anggota</a></li>
        </ul>
    </nav>
</header>
```

Menu tersebut digunakan untuk berpindah ke halaman **Beranda, Daftar Buku, Tambah Buku, dan Daftar Anggota**.

Selain itu, halaman dihubungkan dengan file CSS menggunakan:

```html
<link rel="stylesheet" href="assets/style.css">
```

Link tersebut digunakan untuk menerapkan tampilan dari file `style.css` pada halaman `index.html`.

## 1.2 Bagian Selamat Datang

Pada bagian `<main>` terdapat informasi pembuka untuk pengguna.

```html
<section>
    <h2>Selamat Datang di Sistem Perpustakaan Mini</h2>
    <p>Aplikasi sederhana untuk mengelola data buku dan anggota perpustakaan.</p>
</section>
```

Bagian ini memberikan penjelasan singkat mengenai fungsi SIMPUS-Mini sebagai aplikasi sederhana untuk mengelola data buku dan anggota perpustakaan.

## 1.3 Ringkasan Data

Bagian **Ringkasan** menggunakan elemen `<article>` untuk menampilkan jumlah data perpustakaan.

```html
<section>
    <h2>Ringkasan</h2>
    <article>
        <h3>Total Buku</h3>
        <p>10</p>
    </article>
    <article>
        <h3>Total Anggota</h3>
        <p>7</p>
    </article>
    <article>
        <h3>Sedang Dipinjam</h3>
        <p>3</p>
    </article>
</section>
```

Terdapat tiga informasi, yaitu **Total Buku sebanyak 10, Total Anggota sebanyak 7, dan Sedang Dipinjam sebanyak 3**. Pada Jobsheet 2, ketiga informasi tersebut akan ditampilkan dalam bentuk kartu menggunakan **CSS Grid**.

## 1.4 Footer

Bagian `<footer>` digunakan sebagai penutup halaman.

```html
<footer>
    <p>&copy; 2026 SIMPUS-Mini &mdash; Jobsheet 2</p>
</footer>
```

Footer menampilkan informasi **© 2026 SIMPUS-Mini — Jobsheet 2**.

## 1.5 Kesimpulan

File `index.html` berfungsi sebagai **halaman beranda SIMPUS-Mini** yang menyediakan navigasi dan menampilkan ringkasan informasi mengenai buku, anggota, dan peminjaman perpustakaan. Pada Jobsheet 2, halaman ini telah dihubungkan dengan **CSS eksternal** untuk mengatur tampilan halaman.
