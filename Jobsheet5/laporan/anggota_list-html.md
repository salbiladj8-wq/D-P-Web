# Penjelasan `list.html` (Daftar Anggota)

File `list.html` pada folder `anggota` digunakan untuk menampilkan antarmuka daftar anggota perpustakaan pada sistem SIMPUS-Mini. Halaman ini memuat elemen navigasi utama, fitur pencarian nama anggota, tabel data anggota, serta tautan ke skrip eksternal JavaScript.

---

### 1. Struktur Dasar dan Meta Document

```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMPUS-Mini | Daftar Anggota</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>

```

* `<!DOCTYPE html>` dan `<html lang="id">`: Menentukan bahwa dokumen menggunakan standar HTML5 dengan bahasa Indonesia.
* `<meta name="viewport" content="width=device-width, initial-scale=1">`: Mengatur agar halaman responsif di berbagai ukuran layar device.
* `<link rel="stylesheet" href="../assets/style.css">`: Menghubungkan halaman dengan stylesheet eksternal (`style.css`) untuk mengatur tampilan dasar, layout, dan media query.

---

### 2. Header dan Navigasi Utama

```html
<header>
    <h1>SIMPUS-Mini</h1>
    <button type="button" id="nav-toggle-btn" class="nav-toggle-label" aria-label="Menu">&#9776;</button>
    <nav>
        <ul>
            <li><a href="../index.html">Beranda</a></li>
            <li><a href="../buku/list.html">Daftar Buku</a></li>
            <li><a href="list.html">Daftar Anggota</a></li>
            <li><a href="tambah.html">Tambah Anggota</a></li>
        </ul>
    </nav>
</header>

```

* **Header**: Berisi judul sistem (`SIMPUS-Mini`), tombol hamburger (`#nav-toggle-btn`) untuk tampilan mobile, serta menu navigasi utama.
* **Navigasi (`<nav>`)**: Memuat tautan perpindahan halaman ke Beranda, Daftar Buku, Daftar Anggota, dan Tambah Anggota.

---

### 3. Kotak Pencarian (Search Box)

```html
<div class="search-box">
    <label for="search-input">Cari Nama Anggota</label>
    <input type="text" id="search-input" placeholder="Ketik nama anggota...">
</div>

```

* Menyediakan elemen input teks (`#search-input`) beserta labelnya.
* Digunakan sebagai filter pencarian nama anggota yang nantinya diproses oleh skrip JavaScript (`app.js`).

---

### 4. Tabel Data Anggota Responsif

```html
<div class="table-responsive">
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
    <tbody>
        <tr>
            <td>A001</td>
            <td>Siti Aminah</td>
            <td>Malang</td>
            <td>0812xxxx</td>
            <td><button type="button">Edit</button> <button type="button" class="btn-hapus">Hapus</button></td>
        </tr>
        <!-- Data anggota lainnya -->
    </tbody>
</table>
</div>

```

* Wrapper `<div class="table-responsive">` memungkinkan tabel di-scroll secara horizontal pada layar berukuran kecil.
* Elemen `<table>` menampilkan data anggota yang terdiri dari kolom: **No. Anggota**, **Nama**, **Alamat**, **No. HP**, dan **Aksi** (tombol Edit & Hapus dengan kelas `.btn-hapus`).

---

### 5. Footer dan Penautan JavaScript

```html
    <footer>
        <p>&copy; 2026 SIMPUS-Mini &mdash; Jobsheet 5</p>
    </footer>
    <script src="../assets/js/app.js"></script>
</body>

```

* **Footer**: Menampilkan informasi hak cipta dan label jobsheet yang bersangkutan.
* **Script Tag**: Mengimpor file JavaScript eksternal `app.js` sebelum penutup tag `</body>` untuk menangani interaktivitas (seperti manipulasi DOM, filter pencarian, dan event tombol).

---

### Kesimpulan

File `list.html` berfungsi sebagai antarmuka utama untuk manajemen data anggota pada SIMPUS-Mini. Struktur HTML disusun secara semantik dengan dukungan visual dari `style.css` (termasuk kelas `.table-responsive`) serta siap terintegrasi dengan logika interaktif dari file `app.js`.

```

```