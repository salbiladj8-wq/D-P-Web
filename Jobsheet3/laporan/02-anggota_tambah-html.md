# Penjelasan `anggota/tambah.html`

File `anggota/tambah.html` digunakan untuk menampilkan data anggota perpustakaan dalam bentuk tabel. Pada Jobsheet 3, halaman ini disesuaikan agar dapat ditampilkan dengan baik pada berbagai ukuran layar.

### 1. Meta Viewport

```html
<meta name="viewport" content="width=device-width, initial-scale=1.0">
```

Meta viewport digunakan agar tampilan halaman dapat menyesuaikan ukuran layar perangkat, terutama pada tablet dan smartphone.

### 2. Hamburger Menu

```html
<input type="checkbox" id="nav-toggle" class="nav-toggle">
<label for="nav-toggle" class="nav-toggle-label">&#9776;</label>
```

Kode tersebut digunakan untuk membuat **hamburger menu** pada layar mobile. Checkbox berfungsi sebagai pengontrol menu, sedangkan `label` menampilkan ikon hamburger.

### 3. Tabel Responsif

```html
<div class="table-responsive">
    <table>
        ...
    </table>
</div>
```

Tabel dibungkus dengan `table-responsive` agar dapat **di-scroll secara horizontal** ketika ukuran tabel melebihi lebar layar.

### 4. Data Anggota

```html
<tbody>
    <tr>
        <td>A001</td>
        <td>Siti Aminah</td>
        <td>Malang</td>
        <td>0812xxxx</td>
        <td>...</td>
    </tr>
</tbody>
```

Bagian `<tbody>` berisi data anggota yang disusun menggunakan `<tr>` sebagai baris dan `<td>` sebagai isi setiap kolom. Kolom terakhir berisi tombol **Edit** dan **Hapus**.

### Kesimpulan

Pada `anggota/tambah.html` diterapkan **responsive design** melalui meta viewport, hamburger menu, dan tabel responsif sehingga halaman tetap nyaman digunakan pada berbagai ukuran layar.
