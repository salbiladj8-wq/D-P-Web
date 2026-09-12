# Penjelasan `buku/list.html` (Daftar Buku)

File `list.html` yang berada di dalam folder `buku` digunakan untuk menampilkan antarmuka daftar koleksi buku yang tersedia pada sistem SIMPUS-Mini. Halaman ini memuat navigasi utama sistem, fitur pencarian judul buku, tabel responsif penampung data koleksi, footer, serta penautan ke skrip JavaScript interaktif.

---

### 1. Struktur Dasar dan Meta Document

```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMPUS-Mini | Daftar Buku</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>

```

* `<!DOCTYPE html>` dan `<html lang="id">`: Menandakan dokumen menggunakan standar HTML5 dengan pengaturan bahasa Indonesia.
* `<meta name="viewport" content="width=device-width, initial-scale=1">`: Mengatur rasio tata letak agar antarmuka responsif di layar perangkat seluler maupun desktop.
* `<link rel="stylesheet" href="../assets/style.css">`: Menghubungkan halaman dengan stylesheet eksternal `style.css` untuk menerapkan tema visual dan layout sistem.

---

### 2. Header dan Navigasi Utama

```html
<header>
    <h1>SIMPUS-Mini</h1>
    <button type="button" id="nav-toggle-btn" class="nav-toggle-label" aria-label="Menu">&#9776;</button>
    <nav>
        <ul>
            <li><a href="../index.html">Beranda</a></li>
            <li><a href="list.html">Daftar Buku</a></li>
            <li><a href="../anggota/list.html">Daftar Anggota</a></li>
            <li><a href="../anggota/tambah.html">Tambah Anggota</a></li>
        </ul>
    </nav>
</header>

```

* **Header**: Menampilkan nama aplikasi (`SIMPUS-Mini`) dan tombol hamburger (`#nav-toggle-btn`) untuk membuka menu pada tampilan mobile.
* **Navigasi (`<nav>`)**: Berisi tautan navigasi ke halaman Beranda, Daftar Buku (halaman aktif), Daftar Anggota, dan Tambah Anggota dengan penyesuaian jalur direktori terelasi (`../`).

---

### 3. Kotak Pencarian Judul Buku (Search Box)

```html
<div class="search-box">
    <label for="search-input">Cari Judul Buku</label>
    <input type="text" id="search-input" placeholder="Ketik judul buku...">
</div>

```

* Elemen input `#search-input` berfungsi sebagai bidang entri pencarian real-time.
* Input ini terintegrasi langsung dengan fungsi `initTableFilter()` pada skrip `app.js` untuk memfilter koleksi buku berdasarkan kata kunci yang diketikkan pengguna.

---

### 4. Tabel Data Koleksi Buku Responsif

```html
<div class="table-responsive">
<table>
    <thead>
        <tr>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Tahun</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Laskar Pelangi</td>
            <td>Andrea Hirata</td>
            <td>2005</td>
            <td>4</td>
            <td><button type="button">Edit</button> <button type="button" class="btn-hapus">Hapus</button></td>
        </tr>
        <!-- Data buku lainnya -->
    </tbody>
</table>
</div>

```

* Pembungkus `<div class="table-responsive">` memastikan tabel dapat di-scroll secara horizontal pada layar berukuran sempit tanpa merusak tata letak.
* Elemen `<table>` menampilkan daftar buku dengan rincian kolom **Judul**, **Pengarang**, **Tahun**, **Stok**, serta tombol aksi (**Edit** dan **Hapus** dengan kelas `.btn-hapus`).

---

### 5. Footer dan Penautan JavaScript

```html
    <footer>
        <p>&copy; 2026 SIMPUS-Mini &mdash; Jobsheet 5</p>
    </footer>
    <script src="../assets/js/app.js"></script>
</body>

```

* **Footer**: Menampilkan teks hak cipta aplikasi SIMPUS-Mini dan label materi Jobsheet 5.
* **Script Tag**: Menghubungkan file JavaScript `app.js` yang mengeksekusi fungsi pencarian tabel, aksi tombol hapus, dan pengoperasian hamburger menu.

---

### Kesimpulan

File `buku/list.html` berfungsi sebagai antarmuka utama manajemen koleksi buku pada SIMPUS-Mini. Dengan kombinasi struktur HTML semantik, gaya visual `style.css`, serta interaktivitas dari `app.js`, halaman ini menyajikan daftar buku secara dinamis, rapi, dan responsif.