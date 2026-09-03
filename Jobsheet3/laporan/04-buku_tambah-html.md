# Penjelasan `buku/tambah.html`

File `buku/tambah.html` digunakan untuk menampilkan **form tambah data buku**. Pada Jobsheet 3, halaman ini ditambahkan elemen responsive agar dapat menyesuaikan tampilan pada berbagai ukuran layar.

### 1. Meta Viewport

```html
<meta name="viewport" content="width=device-width, initial-scale=1.0">
```

Meta viewport digunakan agar tampilan halaman dapat menyesuaikan ukuran layar perangkat, terutama pada smartphone dan tablet.

### 2. Hamburger Menu

```html
<input type="checkbox" id="nav-toggle" class="nav-toggle">
<label for="nav-toggle" class="nav-toggle-label">&#9776;</label>
```

Kode tersebut digunakan untuk membuat **hamburger menu** pada tampilan mobile. Checkbox berfungsi sebagai pengontrol menu, sedangkan `label` menampilkan ikon hamburger.

### 3. Form Tambah Buku

```html
<form>
    <p>
        <label for="judul">Judul</label><br>
        <input type="text" id="judul" name="judul" required>
    </p>
    ...
    <p>
        <button type="submit">Simpan</button>
    </p>
</form>
```

Form digunakan untuk memasukkan data buku, seperti **judul, pengarang, tahun terbit, ISBN, stok, dan kategori**. Tombol **Simpan** digunakan untuk mengirim data yang telah diisi.

### 4. Responsive Form

Pada CSS Jobsheet 3, input dan select dibuat menyesuaikan lebar layar:

```css
@media (max-width: 480px) {
    form input,
    form select {
        max-width: 100%;
    }
}
```

Pengaturan tersebut membuat form lebih sesuai digunakan pada layar smartphone.

### Kesimpulan

Pada `buku/tambah.html`, penerapan responsive design dilakukan melalui **meta viewport, hamburger menu, dan pengaturan ukuran form** sehingga halaman tetap nyaman digunakan pada berbagai ukuran layar.
