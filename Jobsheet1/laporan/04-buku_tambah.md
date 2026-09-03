# Penjelasan `buku/tambah.html` (Tambah Buku)

File `tambah.html` yang berada di dalam folder `buku/` digunakan untuk **menambahkan data buku baru** pada sistem SIMPUS-Mini. Halaman ini menggunakan form untuk memasukkan informasi buku.

## 1.1 Struktur Halaman

Halaman terdiri dari `<header>`, `<main>`, dan `<footer>`. Pada bagian `<header>` terdapat nama aplikasi dan menu navigasi untuk berpindah ke halaman Beranda, Daftar Buku, Tambah Buku, dan Daftar Anggota.

## 1.2 Form Tambah Buku

Form dibuat menggunakan elemen `<form>` dan berisi beberapa input untuk data buku.

```html
<form>
    <label for="judul">Judul</label>
    <input type="text" id="judul" name="judul" required>

    <label for="pengarang">Pengarang</label>
    <input type="text" id="pengarang" name="pengarang" required>
</form>
```

Form menyediakan beberapa data yang dapat diisi, yaitu **Judul, Pengarang, Tahun Terbit, ISBN, Stok, dan Kategori**.

## 1.3 Jenis Input

Input disesuaikan dengan jenis data yang dimasukkan. Contohnya, `text` digunakan untuk judul dan pengarang, sedangkan `number` digunakan untuk tahun terbit dan stok.

```html
<input type="number" id="tahun" name="tahun" min="1900" max="2026" required>
<input type="number" id="stok" name="stok" min="0" required>
```

Atribut `required` digunakan agar beberapa data wajib diisi sebelum form dikirim.

## 1.4 Pilihan Kategori dan Tombol Simpan

Kategori buku menggunakan elemen `<select>` dengan tiga pilihan, yaitu **Fiksi, Non-Fiksi, dan Referensi**.

```html
<select id="kategori" name="kategori">
    <option value="fiksi">Fiksi</option>
    <option value="non-fiksi">Non-Fiksi</option>
    <option value="referensi">Referensi</option>
</select>
```

Form dilengkapi tombol **Simpan** dengan `type="submit"` untuk mengirim data yang telah diisi.

## 1.5 Footer

Bagian `<footer>` menjadi penutup halaman dan menampilkan informasi SIMPUS-Mini serta Jobsheet 1.

## 1.6 Kesimpulan

File `buku/tambah.html` berfungsi sebagai **halaman untuk memasukkan data buku baru** melalui form yang terdiri dari judul, pengarang, tahun terbit, ISBN, stok, dan kategori.
