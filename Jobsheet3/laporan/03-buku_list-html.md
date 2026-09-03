# Penjelasan `buku/list.html`

File `buku/list.html` digunakan untuk menampilkan data buku dalam bentuk tabel. Pada Jobsheet 3, halaman ini disesuaikan agar dapat tampil responsif pada berbagai ukuran layar.

### 1. Meta Viewport

```html
<meta name="viewport" content="width=device-width, initial-scale=1.0">
```

Meta viewport digunakan agar tampilan halaman menyesuaikan ukuran layar perangkat, terutama pada tablet dan smartphone.

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

Tabel dibungkus dengan `table-responsive` agar dapat **di-scroll secara horizontal** apabila tabel lebih lebar dari layar.

### 4. Data Buku

```html
<tbody>
    <tr>
        <td>Laskar Pelangi</td>
        <td>Andrea Hirata</td>
        <td>2005</td>
        <td>4</td>
        <td>...</td>
    </tr>
</tbody>
```

Bagian `<tbody>` digunakan untuk menampilkan data buku. Setiap data disusun menggunakan `<tr>` sebagai baris dan `<td>` sebagai isi kolom. Kolom terakhir berisi tombol **Edit** dan **Hapus**.

### Kesimpulan

Pada `buku/list.html` diterapkan **responsive design** melalui meta viewport, hamburger menu, dan tabel responsif sehingga halaman dapat menyesuaikan berbagai ukuran layar.
