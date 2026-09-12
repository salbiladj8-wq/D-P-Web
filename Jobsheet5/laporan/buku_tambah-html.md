# Penjelasan `buku/tambah.html` (Tambah Buku)

File `tambah.html` yang terletak pada folder `buku` digunakan untuk menyediakan antarmuka formulir entri data koleksi buku baru ke dalam sistem SIMPUS-Mini. Halaman ini memuat elemen meta dan link stylesheet, header dengan navigasi utama, formulir input dengan berbagai tipe input data beserta aturan validasi HTML5, footer, serta penautan ke file skrip JavaScript.

---

### 1. Struktur Dasar dan Meta Document

```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMPUS-Mini | Tambah Buku</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>

```

* `<!DOCTYPE html>` dan `<html lang="id">`: Menentukan tipe dokumen HTML5 dan mengatur bahasa utama antarmuka (Bahasa Indonesia).
* `<meta name="viewport" content="width=device-width, initial-scale=1">`: Memastikan antarmuka dapat menyesuaikan ukuran layar perangkat (responsif) baik pada mobile maupun desktop.
* `<link rel="stylesheet" href="../assets/style.css">`: Menghubungkan dokumen dengan file `style.css` untuk menerapkan skema warna, animasi focus form, dan tata letak halaman.

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

* **Header**: Memuat nama aplikasi (`SIMPUS-Mini`) serta tombol hamburger (`#nav-toggle-btn`) untuk pengoperasian navigasi pada layar mobile.
* **Navigasi (`<nav>`)**: Berisi tautan untuk berpindah antarmenu utama (Beranda, Daftar Buku, Daftar Anggota, dan Tambah Anggota) menggunakan path direktori relatif (`../`).

---

### 3. Formulir Input Data Buku (`#form-tambah`)

```html
<form id="form-tambah">
    <p>
        <label for="judul">Judul</label><br>
        <input type="text" id="judul" name="judul" required>
    </p>
    <p>
        <label for="pengarang">Pengarang</label><br>
        <input type="text" id="pengarang" name="pengarang" required>
    </p>
    <p>
        <label for="tahun">Tahun Terbit</label><br>
        <input type="number" id="tahun" name="tahun" min="1900" max="2026" required>
    </p>
    <p>
        <label for="isbn">ISBN</label><br>
        <input type="text" id="isbn" name="isbn">
    </p>
    <p>
        <label for="stok">Stok</label><br>
        <input type="number" id="stok" name="stok" min="0" required>
    </p>
    <p>
        <label for="kategori">Kategori</label><br>
        <select id="kategori" name="kategori">
            <option value="Fiksi">Fiksi</option>
            <option value="Non-Fiksi">Non-Fiksi</option>
            <option value="Referensi">Referensi</option>
        </select>
    </p>
    <p>
        <button type="submit">Simpan</button>
    </p>
</form>

```

* **`<form id="form-tambah">`**: Berfungsi sebagai wadah penampung elemen-elemen input data yang nantinya akan divalidasi dan diproses oleh JavaScript `app.js`.
* **Field Teks (`judul`, `pengarang`, `isbn`)**: Menggunakan `<input type="text">` di mana kolom `judul` dan `pengarang` bersifat wajib diisi (`required`).
* **Field Angka (`tahun`, `stok`)**: Menggunakan `<input type="number">` dengan batasan nilai bawaan:
* `tahun`: Dibatasi rentang tahun `min="1900"` hingga `max="2026"`.
* `stok`: Dibatasi nilai minimal `min="0"` agar stok tidak bernilai negatif.


* **Dropdown Options (`kategori`)**: Menggunakan `<select>` dengan opsi pilihan **Fiksi**, **Non-Fiksi**, dan **Referensi**.
* **Tombol Submit**: Menggunakan `<button type="submit">Simpan</button>` untuk mengirimkan data form.

---

### 4. Footer dan Penautan JavaScript

```html
    <footer>
        <p>&copy; 2026 SIMPUS-Mini &mdash; Jobsheet 5</p>
    </footer>
    <script src="../assets/js/app.js"></script>
</body>

```

* **Footer**: Menampilkan informasi hak cipta dan label Jobsheet 5.
* **Script Tag**: Menghubungkan file JavaScript `app.js` sebelum penutup tag `</body>` untuk menangani logika interaktif, seperti validasi error custom pada input judul, pengarang, tahun, dan stok saat form disubmit.

---

### Kesimpulan

File `buku/tambah.html` berfungsi sebagai antarmuka input data koleksi buku baru pada SIMPUS-Mini. Dengan memadukan elemen form HTML5 beserta atribut validasinya (`required`, `min`, `max`), gaya tampilan dari `style.css`, serta penanganan pesan error dari `app.js`, formulir ini memastikan data buku yang dimasukkan pengguna terstruktur dan valid.

```

```