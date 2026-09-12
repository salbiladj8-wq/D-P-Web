# Penjelasan `style.css`

File `style.css` digunakan untuk mengatur seluruh tata letak (layout), tema warna, gaya elemen antarmuka, serta mendukung **responsive design** pada sistem SIMPUS-Mini. Pada versi ini, CSS ditambahkan aturan khusus untuk mendukung tombol hamburger berbasis JavaScript (`.nav-open`), pesan error validasi, kotak pencarian, serta *breakpoint* responsif media query.

---

### 1. Reset dan Tampilan Dasar

```css
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: "Segoe UI", Arial, sans-serif;
    color: #5a4545;
    background-color: #fff5f2;
    line-height: 1.5;
}

a {
    color: #d47b82;
    text-decoration: none;
}

```

* **Reset Selector (`*`)**: Menghilangkan margin dan padding bawaan browser serta menetapkan `box-sizing: border-box` agar kalkulasi ukuran elemen tetap konsisten.
* **Body & Links**: Menetapkan font utama, skema warna teks, warna latar belakang nuansa pastel/soft, serta pengaturan gaya dasar untuk hyperlink.

---

### 2. Header dan Navbar (Flexbox)

```css
header {
    background-color: #f3a6ad;
    color: #fff;
    padding: 1rem 1.5rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    border-radius: 0 0 25px 25px;
    box-shadow: 0 4px 12px rgba(214, 132, 140, 0.2);
}

header nav ul {
    list-style: none;
    display: flex;
    gap: 1.25rem;
}

```

* Menggunakan **Flexbox** pada elemen `<header>` dan `<ul>` navigasi untuk menyusun judul, tombol menu, dan tautan halaman secara horizontal dan sejajar.
* Menambahkan *border-radius* di bagian bawah dan *box-shadow* lembut untuk mempercantik estetika header.

---

### 3. Layout Main & Kartu Statistik (CSS Grid)

```css
main section:nth-of-type(2) {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
    border-left: none;
}

main section:nth-of-type(2) article {
    background-color: #ffe0d6;
    border-radius: 8px;
    padding: 1.25rem;
    text-align: center;
    transition: 0.3s;
}

main section:nth-of-type(2) article:hover {
    transform: translateY(-5px);
}

```

* Menggunakan **CSS Grid** (`repeat(3, 1fr)`) untuk membagi kartu statistik menjadi tiga kolom sejajar pada tampilan desktop.
* Efek `:hover` memindahkan posisi kartu ke atas (`translateY(-5px)`) untuk memberikan animasi interaktif saat kursor diarahkan.

---

### 4. Styling Tabel & Tabel Responsif

```css
table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    border-radius: 15px;
}

tbody tr:nth-child(even) {
    background-color: #fff8f6;
}

.table-responsive {
    overflow-x: auto;
}

```

* Memberikan gaya warna belang-belang (*zebra striping*) pada baris genap tabel (`nth-child(even)`).
* Kelas `.table-responsive` berfungsi membuat tabel dapat di-scroll secara horizontal jika ukuran layar perangkat lebih kecil dari lebar tabel.

---

### 5. Form, Error Validasi, dan Search Box

```css
form input:focus,
form select:focus {
    border-color: #f3a6ad;
    box-shadow: 0 0 0 3px rgba(243, 166, 173, 0.15);
}

.error {
    display: block;
    color: #d9534f;
    font-size: 0.85rem;
    margin-top: 0.25rem;
}

.search-box input {
    width: 100%;
    max-width: 320px;
    padding: 0.5rem 0.75rem;
    border: 2px solid #f1c7c2;
    border-radius: 15px;
}

```

* Menyediakan gaya visual saat input dalam keadaan aktif (`:focus`).
* Kelas `.error` menampilkan teks peringatan berwarna merah di bawah elemen input ketika terjadi kesalahan validasi.
* `.search-box` memberikan gaya khusus untuk kolom pencarian nama/data pada tabel.

---

### 6. Hamburger Menu & Responsive Breakpoints

```css
/* Tablet (max-width: 768px) */
@media (max-width: 768px) {
    main section:nth-of-type(2) {
        grid-template-columns: repeat(2, 1fr);
    }
}

/* Mobile (max-width: 480px) */
@media (max-width: 480px) {
    .nav-toggle-label {
        display: block;
    }

    header nav {
        display: none;
        width: 100%;
        order: 3;
    }

    header nav.nav-open {
        display: block;
    }

    main section:nth-of-type(2) {
        grid-template-columns: 1fr;
    }
}

```

* **Breakpoint Tablet (768px)**: Kartu statistik disesuaikan menjadi 2 kolom.
* **Breakpoint Mobile (480px)**:
* Tombol hamburger menu (`.nav-toggle-label`) ditampilkan.
* Navigasi disembunyikan secara bawaan (`display: none`) dan hanya akan muncul saat kelas `.nav-open` ditambahkan oleh JavaScript `app.js`.
* Kartu statistik berubah menjadi 1 kolom vertical stack.



---

### Kesimpulan

`style.css` bertanggung jawab penuh atas penampilan visual SIMPUS-Mini. Dengan memanfaatkan **Flexbox**, **CSS Grid**, dan **Media Queries**, file ini memastikan antarmuka tetap konsisten, rapi, serta responsif di berbagai ukuran perangkat, sekaligus mendukung integrasi logika JavaScript untuk menu dan validasi.

```

```