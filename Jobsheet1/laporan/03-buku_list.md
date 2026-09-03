# Penjelasan `buku/list.html` (Daftar Buku)

File `list.html` yang berada di dalam folder `buku/` digunakan untuk **menampilkan daftar buku** pada sistem SIMPUS-Mini. Halaman ini dilengkapi menu navigasi dan tombol aksi untuk setiap data buku.

## 1.1 Struktur Tabel

Data buku ditampilkan menggunakan elemen `<table>` yang terdiri dari `<thead>` sebagai judul kolom dan `<tbody>` sebagai isi data.

```html
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
        ...
    </tbody>
</table>
```

Tabel memiliki lima kolom, yaitu **Judul, Pengarang, Tahun, Stok, dan Aksi**. Setiap data buku dibuat menggunakan `<tr>` sebagai baris dan `<td>` sebagai isi setiap kolom.

## 1.2 Data dan Tombol Aksi

Pada bagian `<tbody>` terdapat **10 data buku**, seperti *Laskar Pelangi, Bumi Manusia, Negeri 5 Menara, Filosofi Teras,* dan buku lainnya.

Setiap baris memiliki dua tombol pada kolom Aksi:

```html
<button type="button">Edit</button>
<button type="button">Hapus</button>
```

Tombol **Edit** dan **Hapus** digunakan sebagai tombol aksi pada data buku.

## 1.3 Menu Navigasi

Menu navigasi berisi tautan **Beranda, Daftar Buku, Tambah Buku, dan Daftar Anggota**.

```html
<li><a href="../index.html">Beranda</a></li>
<li><a href="../buku/list.html">Daftar Buku</a></li>
<li><a href="tambah.html">Tambah Buku</a></li>
<li><a href="../anggota/list.html">Daftar Anggota</a></li>
```

Karena file berada di dalam folder `buku/`, penggunaan `../` digunakan untuk **naik satu tingkat folder**, sedangkan `tambah.html` berada dalam folder yang sama.

## 1.4 Footer

Bagian akhir halaman menggunakan `<footer>`:

```html
<footer>
    <p>&copy; 2026 SIMPUS-Mini &mdash; Jobsheet 1</p>
</footer>
```

Footer menampilkan teks **© 2026 SIMPUS-Mini — Jobsheet 1** sebagai penutup halaman.

## 1.5 Kesimpulan

File `buku/list.html` berfungsi untuk **menampilkan daftar buku SIMPUS-Mini dalam bentuk tabel**, dilengkapi menu navigasi serta tombol Edit dan Hapus pada setiap data buku.
