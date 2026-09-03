# Penjelasan `style.css`

File `style.css` merupakan **file CSS eksternal** yang digunakan untuk mengatur tampilan seluruh halaman SIMPUS-Mini. CSS ini mengatur warna, ukuran, jarak, tata letak, tabel, form, serta efek interaksi pada halaman.

## 2.1 Reset dan Tampilan Dasar

Bagian ini digunakan untuk mengatur ukuran elemen dan menghilangkan margin serta padding bawaan browser.

```css
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}
```

Selanjutnya, bagian `body` digunakan untuk menentukan jenis font, warna teks, warna latar belakang, dan jarak antarbaris.

```css
body {
    font-family: "Segoe UI", Arial, sans-serif;
    color: #5a4545;
    background-color: #fff5f2;
    line-height: 1.5;
}
```

## 2.2 Pengaturan Link

CSS pada bagian ini mengatur warna dan tampilan link pada halaman.

```css
a {
    color: #d47b82;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}
```

Ketika link diarahkan dengan mouse, teks akan diberi garis bawah sebagai efek interaksi.

## 2.3 Header dan Navbar

Bagian `header` menggunakan **Flexbox** untuk mengatur posisi nama aplikasi dan menu navigasi.

```css
header {
    background-color: #f3a6ad;
    color: #fff;
    padding: 1rem 1.5rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
}
```

Penggunaan `display: flex` membuat elemen di dalam header dapat diatur secara fleksibel. `justify-content: space-between` digunakan untuk memberikan jarak antara nama aplikasi dan navigasi.

Pada navbar, `display: flex` juga digunakan agar menu tersusun secara horizontal.

```css
header nav ul {
    list-style: none;
    display: flex;
    gap: 1.25rem;
}
```

## 2.4 Pengaturan Main dan Section

Bagian `main` digunakan untuk menentukan lebar maksimum dan posisi konten.

```css
main {
    max-width: 1000px;
    margin: 2rem auto;
    padding: 0 1.5rem;
}
```

Setiap `section` diberikan warna putih, padding, border, sudut membulat, dan bayangan agar tampilan lebih rapi.

```css
section {
    background-color: #fff;
    border-radius: 20px;
    padding: 1.5rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 5px 15px rgba(190, 120, 120, 0.12);
    border-left: 5px solid #f6b6a8;
}
```

## 2.5 Kartu Statistik dengan CSS Grid

Bagian ini menggunakan **CSS Grid** untuk mengatur tiga kartu statistik pada halaman beranda.

```css
main section:nth-of-type(2) {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
    border-left: none;
}
```

`grid-template-columns: repeat(3, 1fr)` membuat tiga kolom dengan ukuran yang sama. Judul **Ringkasan** dibuat memenuhi seluruh kolom menggunakan:

```css
main section:nth-of-type(2) h2 {
    grid-column: 1 / -1;
}
```

Setiap kartu statistik juga diberikan padding, warna latar belakang, sudut membulat, dan efek bayangan.

```css
main section:nth-of-type(2) article {
    background-color: #ffe0d6;
    border-radius: 8px;
    padding: 1.25rem;
    text-align: center;
    box-shadow: 0 4px 10px rgba(200, 130, 130, 0.1);
    transition: 0.3s;
}
```

Ketika mouse diarahkan ke kartu, kartu akan sedikit naik menggunakan efek `hover`.

```css
main section:nth-of-type(2) article:hover {
    transform: translateY(-5px);
}
```

## 2.6 Pengaturan Tabel

Bagian tabel digunakan untuk mengatur tampilan daftar buku dan anggota.

```css
table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    overflow: hidden;
    border-radius: 15px;
}
```

Header tabel diberikan warna merah muda dan teks berwarna putih.

```css
thead {
    background-color: #f3a6ad;
    color: #fff;
}
```

Selain itu, baris tabel diberikan warna berbeda secara bergantian dan efek ketika diarahkan dengan mouse.

```css
tbody tr:nth-child(even) {
    background-color: #fff8f6;
}

tbody tr:hover {
    background-color: #ffe9e3;
}
```

## 2.7 Pengaturan Tombol

Tombol Edit dan Hapus diberikan padding, warna, bentuk membulat, serta efek ketika diarahkan dengan mouse.

```css
td button {
    padding: 0.4rem 0.8rem;
    margin-right: 0.35rem;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    font-size: 0.85rem;
    transition: 0.2s;
}
```

Efek `hover` membuat tombol sedikit membesar dan menjadi lebih transparan.

```css
td button:hover {
    transform: scale(1.05);
    opacity: 0.85;
}
```

## 2.8 Pengaturan Form

Bagian form digunakan untuk mengatur tampilan input, label, dan select pada halaman tambah buku.

```css
form input,
form select {
    width: 100%;
    max-width: 400px;
    padding: 0.65rem 0.8rem;
    border: 2px solid #f1c7c2;
    border-radius: 15px;
    font-size: 1rem;
    background-color: #fffafa;
    outline: none;
}
```

Ketika input dipilih, warna border dan bayangan akan berubah menggunakan pseudo-class `:focus`.

```css
form input:focus,
form select:focus {
    border-color: #f3a6ad;
    box-shadow: 0 0 0 3px rgba(243, 166, 173, 0.15);
}
```

Tombol submit juga diberikan warna dan efek `hover` agar lebih menarik.

## 2.9 Footer

Bagian `footer` digunakan untuk mengatur tampilan teks pada bagian bawah halaman.

```css
footer {
    text-align: center;
    padding: 1.25rem;
    color: #a88787;
    font-size: 0.9rem;
}
```

Footer dibuat rata tengah dengan ukuran teks yang lebih kecil agar terlihat sederhana.

## 2.10 Kesimpulan

File `style.css` digunakan untuk memberikan **styling pada seluruh halaman SIMPUS-Mini**. CSS yang diterapkan mencakup **Box Model, Flexbox pada navbar, CSS Grid pada kartu statistik, styling tabel dan form, serta efek `hover` dan `focus`**. Dengan adanya CSS eksternal, tampilan setiap halaman menjadi lebih rapi, konsisten, dan menarik.
