# Penjelasan `style.css`

File `style.css` digunakan untuk mengatur tampilan seluruh halaman SIMPUS-Mini. Pada Jobsheet 3, CSS ditambahkan beberapa aturan untuk mendukung **responsive design**, yaitu tabel responsif, hamburger menu, dan breakpoint untuk tablet serta mobile.

### 1. Reset dan Tampilan Dasar

```css
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}
```

Digunakan untuk mengatur ukuran elemen serta menghilangkan margin dan padding bawaan browser.

```css
body {
    font-family: "Segoe UI", Arial, sans-serif;
    color: #5a4545;
    background-color: #fff5f2;
    line-height: 1.5;
}
```

Mengatur jenis font, warna teks, warna latar belakang, dan jarak antarbaris halaman.

### 2. Header dan Navbar

```css
header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
}
```

Header menggunakan **Flexbox** untuk mengatur posisi judul dan navigasi agar tersusun dengan rapi.

### 3. Kartu Statistik

```css
main section:nth-of-type(2) {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
}
```

Bagian statistik menggunakan **CSS Grid** dengan tiga kolom pada tampilan desktop.

### 4. Tabel Responsif

```css
.table-responsive {
    overflow-x: auto;
}
```

Digunakan agar tabel dapat di-scroll secara horizontal ketika ukuran tabel melebihi lebar layar.

### 5. Hamburger Menu

```css
.nav-toggle {
    display: none;
}

.nav-toggle-label {
    display: none;
    font-size: 1.6rem;
    cursor: pointer;
    color: #fff;
}
```

Checkbox disembunyikan dan label digunakan sebagai tombol hamburger. Menu ini akan aktif pada ukuran layar mobile.

### 6. Responsive Breakpoint

```css
@media (max-width: 768px) {
    main section:nth-of-type(2) {
        grid-template-columns: repeat(2, 1fr);
    }
}
```

Pada layar maksimal **768px**, kartu statistik berubah dari tiga menjadi dua kolom.

```css
@media (max-width: 480px) {
    .nav-toggle-label {
        display: block;
    }

    header nav {
        display: none;
    }

    .nav-toggle:checked ~ nav {
        display: block;
    }

    main section:nth-of-type(2) {
        grid-template-columns: 1fr;
    }
}
```

Pada layar maksimal **480px**, hamburger menu ditampilkan, navigasi dapat dibuka menggunakan checkbox, dan kartu statistik berubah menjadi satu kolom.

### Kesimpulan

`style.css` pada Jobsheet 3 menerapkan **responsive design** menggunakan media query. Tampilan dapat menyesuaikan desktop, tablet, dan mobile, serta dilengkapi hamburger menu dan tabel yang dapat di-scroll pada layar kecil.
