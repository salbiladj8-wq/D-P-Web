# 1. Tujuan

Jobsheet 3 bertujuan membuat **SIMPUS-Mini** menjadi responsif pada desktop, tablet, dan smartphone.

Perubahan yang dilakukan meliputi **meta viewport, hamburger menu, tabel responsif, responsive grid, dan responsive form**.

# 2. Perubahan pada HTML

Perubahan dilakukan pada seluruh file HTML dengan menambahkan **meta viewport** dan **hamburger menu**. Pada halaman yang memiliki tabel juga ditambahkan pembungkus `.table-responsive`.

# 3. Hamburger Menu

Hamburger menu dibuat menggunakan **checkbox hack CSS** tanpa JavaScript.

```html
<input type="checkbox" id="nav-toggle" class="nav-toggle">
<label for="nav-toggle" class="nav-toggle-label">&#9776;</label>
```

Pada layar mobile, menu navigasi disembunyikan dan dapat dibuka melalui ikon hamburger.

# 4. Tabel Responsif

Tabel dibungkus dengan `.table-responsive` agar dapat di-scroll secara horizontal pada layar kecil.

```css
.table-responsive {
    overflow-x: auto;
}
```

# 5. Responsive Grid

Kartu statistik menggunakan CSS Grid dan menyesuaikan jumlah kolom berdasarkan ukuran layar:

* **Desktop:** 3 kolom
* **Tablet ≤768px:** 2 kolom
* **Mobile ≤480px:** 1 kolom

# 6. Responsive Form

Pada layar mobile, input dan select menggunakan lebar maksimal `100%` agar menyesuaikan area layar.

# 7. Kesimpulan

Jobsheet 3 menambahkan **responsive design** pada SIMPUS-Mini sehingga tampilan lebih nyaman digunakan pada desktop, tablet, maupun smartphone.