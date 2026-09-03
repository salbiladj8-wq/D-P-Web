# Penjelasan `anggota/list.html` (Daftar Anggota)

File `list.html` yang berada di dalam folder `anggota/` digunakan untuk **menampilkan data anggota perpustakaan SIMPUS-Mini** dalam bentuk tabel. Halaman ini juga dilengkapi menu navigasi untuk berpindah ke halaman lainnya.

## 1.1 Struktur Tabel

Data anggota ditampilkan menggunakan elemen `<table>` yang terdiri dari `<thead>` sebagai judul kolom dan `<tbody>` sebagai isi data.

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
    <tbody>
        ...
    </tbody>
</table>
```

Tabel memiliki lima kolom, yaitu **No. Anggota, Nama, Alamat, No. HP, dan Aksi**. Setiap data dibuat menggunakan `<tr>` sebagai baris dan `<td>` sebagai isi setiap kolom.

## 1.2 Data dan Tombol Aksi

Pada bagian `<tbody>` terdapat **7 data anggota**, mulai dari `A001` sampai `A007`, yaitu Siti Aminah, Budi Sentoso, Salbila, Najwa, Bebe, Andra, dan Dewfan.

Setiap baris memiliki dua tombol pada kolom Aksi:

```html
<button type="button">Edit</button>
<button type="button">Hapus</button>
```

Tombol **Edit** dan **Hapus** masih berupa tombol biasa dan **belum memiliki fungsi** untuk mengubah atau menghapus data.

## 1.3 Menu Navigasi

Menu navigasi berisi empat tautan, yaitu **Beranda, Daftar Buku, Daftar Anggota, dan Tambah Anggota**.

```html
<li><a href="../index.html">Beranda</a></li>
<li><a href="../buku/list.html">Daftar Buku</a></li>
<li><a href="list.html">Daftar Anggota</a></li>
<li><a href="tambah.html">Tambah Anggota</a></li>
```

Karena file berada di dalam folder `anggota/`, penggunaan `../` digunakan untuk **naik satu tingkat folder**. Sedangkan `list.html` dan `tambah.html` berada dalam folder yang sama sehingga dapat ditulis langsung.

## 1.4 Footer

Bagian akhir halaman menggunakan `<footer>`:

```html
<footer>
    <p>&copy; 2026 SIMPUS-Mini &mdash; Jobsheet</p>
</footer>
```

Footer menampilkan teks **© 2026 SIMPUS-Mini — Jobsheet** sebagai penutup halaman.

## 1.5 Kesimpulan

File `anggota/list.html` berfungsi untuk **menampilkan daftar anggota SIMPUS-Mini dalam bentuk tabel**, dilengkapi menu navigasi serta tombol Edit dan Hapus. Data anggota yang digunakan merupakan **data contoh (dummy)** untuk latihan pembuatan halaman HTML.
