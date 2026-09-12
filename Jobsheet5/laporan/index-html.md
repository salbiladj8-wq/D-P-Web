# Penjelasan `index.html` (Beranda)

File `index.html` merupakan halaman utama (landing page) dari aplikasi SIMPUS-Mini. Halaman ini menyajikan ucapan selamat datang, ringkasan informasi sistem, statistik perpustakaan berupa kartu ringkasan (*dashboard cards*), navigasi utama aplikasi, serta penautan ke stylesheet dan skrip JavaScript eksternal.

---

### 1. Struktur Dasar dan Meta Document

```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMPUS-Mini | Beranda</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

```

* `<!DOCTYPE html>` dan `<html lang="id">`: Menandakan dokumen menggunakan standar HTML5 dengan pengaturan bahasa Indonesia.
* `<meta name="viewport" content="width=device-width, initial-scale=1.0">`: Mengatur rasio tampilan halaman agar responsif saat dibuka di berbagai perangkat (desktop, tablet, mobile).
* `<link rel="stylesheet" href="assets/style.css">`: Menghubungkan halaman utama langsung ke file stylesheet `assets/style.css` tanpa perlu menggunakan *parent directory* (`../`).

---

### 2. Header dan Navigasi Utama

```html
<header>
    <h1>SIMPUS-Mini</h1>

    <button type="button" id="nav-toggle-btn" class="nav-toggle-label" aria-label="Menu">&#9776;</button>

    <nav>
        <ul>
            <li><a href="index.html">Beranda</a></li>
            <li><a href="buku/list.html">Daftar Buku</a></li>
            <li><a href="anggota/list.html">Daftar Anggota</a></li>
            <li><a href="anggota/tambah.html">Tambah Anggota</a></li>
        </ul>
    </nav>
</header>

```

* **Header**: Berisi judul aplikasi (`SIMPUS-Mini`) dan tombol hamburger (`#nav-toggle-btn`) untuk mengoperasikan navigasi pada layar mobile.
* **Navigasi (`<nav>`)**: Berfungsi sebagai menu navigasi utama untuk mengakses halaman Beranda, Daftar Buku, Daftar Anggota, dan Tambah Anggota.

---

### 3. Konten Utama dan Kartu Statistik

```html
<main>
    <section>
        <h2>Selamat Datang di SIMPUS-Mini</h2>
        <p>
            Sistem Informasi Perpustakaan sederhana untuk mengelola data buku
            dan anggota perpustakaan.
        </p>
    </section>

    <section>
        <h2>Statistik Perpustakaan</h2>

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
</main>

```

* **Section Sambutan**: Menyajikan informasi singkat mengenai fungsi dan kegunaan sistem SIMPUS-Mini.
* **Section Statistik (`article`)**: Menampilkan 3 buah kartu statistik perpustakaan:
* **Total Buku**: Menampilkan jumlah total koleksi buku (10 buku).
* **Total Anggota**: Menampilkan jumlah anggota terdaftar (7 anggota).
* **Sedang Dipinjam**: Menampilkan jumlah buku yang sedang dalam masa peminjaman (3 buku).


* Tata letak ketiga kartu ini diatur menggunakan **CSS Grid** (3 kolom pada desktop, 2 kolom pada tablet, dan 1 kolom pada mobile).

---

### 4. Footer dan Penautan JavaScript

```html
<footer>
    <p>&copy; 2026 SIMPUS-Mini</p>
</footer>

<script src="assets/js/app.js"></script>
</body>

```

* **Footer**: Menampilkan informasi hak cipta aplikasi SIMPUS-Mini.
* **Script Tag**: Mengimpor file JavaScript eksternal `assets/js/app.js` sebelum penutup tag `</body>` untuk menjalankan fungsi interaktif seperti pengoperasian hamburger menu pada tampilan mobile.

---

### Kesimpulan

File `index.html` bertindak sebagai halaman muka (dashboard) SIMPUS-Mini. Dengan memadukan elemen HTML5 semantik, layout responsif dari `style.css` (terutama untuk kartu statistik berbasis CSS Grid), serta interaktivitas dari `app.js`, halaman ini menyajikan ringkasan data perpustakaan dengan jelas dan informatif.

```

```