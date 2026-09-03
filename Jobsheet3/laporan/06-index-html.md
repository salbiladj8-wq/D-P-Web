# Penjelasan `index.html`

File `index.html` merupakan halaman **Beranda** dari SIMPUS-Mini. Pada Jobsheet 3, halaman ini ditambahkan elemen responsive agar dapat menyesuaikan tampilan pada berbagai ukuran layar.

### 1. Meta Viewport

```html
<meta name="viewport" content="width=device-width, initial-scale=1.0">
```

Digunakan agar tampilan halaman dapat menyesuaikan dengan lebar layar perangkat, terutama pada tablet dan smartphone.

### 2. Hamburger Menu

```html
<input type="checkbox" id="nav-toggle" class="nav-toggle">
<label for="nav-toggle" class="nav-toggle-label">&#9776;</label>
```

Digunakan untuk membuat **hamburger menu** pada tampilan mobile. Checkbox menjadi pengontrol menu, sedangkan `label` menampilkan ikon hamburger.

### 3. Bagian Selamat Datang

```html
<section>
    <h2>Selamat Datang di Sistem Perpustakaan Mini</h2>
    <p>Aplikasi sederhana untuk mengelola data buku dan anggota perpustakaan.</p>
</section>
```

Bagian ini memberikan informasi singkat mengenai fungsi dari aplikasi SIMPUS-Mini.

### 4. Ringkasan Statistik

```html
<section>
    <h2>Ringkasan</h2>
    <article>
        <h3>Total Buku</h3>
        <p>10</p>
    </article>
    <article>
        <h3>Total Anggota</h3>
        <p>7</p>
    </article>
    <article>
        <h3>Sedang Dipinjam</h3>
        <p>3</p>
    </article>
</section>
```

Bagian ini menampilkan ringkasan data perpustakaan berupa jumlah buku, anggota, dan buku yang sedang dipinjam. Susunan kartu statistik akan menyesuaikan ukuran layar melalui CSS Grid dan media query.

### 5. Footer

```html
<footer>
    <p>&copy; 2026 SIMPUS-Mini &mdash; Jobsheet 2</p>
</footer>
```

Footer digunakan sebagai bagian penutup halaman dan menampilkan informasi SIMPUS-Mini.

### Kesimpulan

Pada `index.html`, penerapan responsive design dilakukan melalui **meta viewport, hamburger menu, dan CSS Grid pada kartu statistik** sehingga tampilan beranda dapat menyesuaikan ukuran layar perangkat.
