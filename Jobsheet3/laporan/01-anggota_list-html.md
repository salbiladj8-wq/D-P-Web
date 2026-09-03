# Penjelasan `anggota/list.html`

File `anggota/list.html` digunakan untuk menampilkan data anggota perpustakaan dalam bentuk tabel. Pada Jobsheet 3, halaman ini ditambahkan beberapa bagian untuk mendukung tampilan responsif.

### 1. Meta Viewport

```html
<meta name="viewport" content="width=device-width, initial-scale=1.0">
```

Meta viewport digunakan agar tampilan halaman dapat menyesuaikan ukuran layar perangkat, baik desktop, tablet, maupun smartphone.

### 2. Hamburger Menu

```html
<input type="checkbox" id="nav-toggle" class="nav-toggle">
<label for="nav-toggle" class="nav-toggle-label">&#9776;</label>
```

Kode tersebut digunakan untuk membuat tombol hamburger pada tampilan mobile. Checkbox berfungsi sebagai pengontrol menu, sedangkan `label` menampilkan ikon hamburger. Teknik ini menggunakan CSS tanpa JavaScript.

### 3. Tabel Responsif

```html
<div class="table-responsive">
    <table>
        ...
    </table>
</div>
```

Tabel dibungkus dengan `table-responsive` agar dapat di-scroll secara horizontal ketika ukuran tabel lebih besar daripada layar.

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

Bagian `<tbody>` digunakan untuk menampilkan data anggota. Setiap data disusun menggunakan `<tr>` dan `<td>`, serta terdapat tombol **Edit** dan **Hapus** pada kolom aksi.

### Kesimpulan

`anggota/list.html` telah disesuaikan dengan konsep **responsive design** melalui meta viewport, hamburger menu, dan tabel responsif sehingga halaman dapat digunakan pada berbagai ukuran layar.
