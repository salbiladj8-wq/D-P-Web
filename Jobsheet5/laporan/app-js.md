# Penjelasan `app.js`

File `app.js` digunakan untuk menambahkan logika interaktif dan manipulasi DOM pada antarmuka sistem SIMPUS-Mini. File ini mencakup fungsionalitas navigasi mobile (hamburger menu), konfirmasi hapus data, pencarian/filtering tabel secara real-time, serta validasi formulir entri data.

---

### 1. Inisialisasi Hamburger Menu (`initNavToggle`)

```javascript
function initNavToggle() {
    const toggleBtn = document.getElementById("nav-toggle-btn");
    const nav = document.querySelector("header nav");
    if (!toggleBtn || !nav) return;

    toggleBtn.addEventListener("click", function () {
        nav.classList.toggle("nav-open");
    });
}

```

* Mencari elemen tombol (`#nav-toggle-btn`) dan elemen navigasi (`header nav`).
* Menambahkan *event listener* `click` yang berfungsi melakukan `toggle` kelas `.nav-open` pada navigasi untuk membuka atau menutup menu pada tampilan layar kecil.

---

### 2. Konfirmasi Hapus Data (`initHapusConfirm`)

```javascript
function initHapusConfirm() {
    document.querySelectorAll(".btn-hapus").forEach(function (btn) {
        btn.addEventListener("click", function () {
            const row = btn.closest("tr");
            const nama = row ? row.querySelector("td")?.textContent : "data ini";
            const yakin = confirm("Yakin ingin menghapus \"" + nama + "\"?");
            if (yakin && row) {
                row.remove();
            }
        });
    });
}

```

* Menyeleksi seluruh tombol dengan kelas `.btn-hapus`.
* Mengambil data baris tabel (`tr`) terdekat dan membaca teks kolom pertama untuk menampilkan dialog `confirm`.
* Jika pengguna mengonfirmasi (`yakin === true`), elemen baris tabel (`row`) akan dihapus langsung dari DOM menggunakan `row.remove()`.

---

### 3. Filter / Pencarian Tabel Real-Time (`initTableFilter`)

```javascript
function initTableFilter() {
    const input = document.getElementById("search-input");
    const table = document.querySelector(".table-responsive table");
    if (!input || !table) return;

    input.addEventListener("keyup", function () {
        const keyword = input.value.toLowerCase();
        const rows = table.querySelectorAll("tbody tr");
        rows.forEach(function (row) {
            const teks = row.textContent.toLowerCase();
            row.style.display = teks.includes(keyword) ? "" : "none";
        });
    });
}

```

* Memantau input kata kunci pada `#search-input` menggunakan event `keyup`.
* Mengonversi teks pencarian dan isi baris tabel ke huruf kecil (`toLowerCase`).
* Menyembunyikan baris tabel (`display: "none"`) yang tidak mengandung kata kunci, dan menampilkan baris yang cocok.

---

### 4. Helper dan Validasi Form (`initValidasiForm`)

```javascript
function tampilkanError(input, pesan) {
    hapusError(input);
    const span = document.createElement("span");
    span.className = "error";
    span.textContent = pesan;
    input.insertAdjacentElement("afterend", span);
}

function hapusError(input) {
    const next = input.nextElementSibling;
    if (next && next.classList.contains("error")) {
        next.remove();
    }
}

```

* **`tampilkanError`**: Membuat elemen `<span>` dengan kelas `.error` untuk menampilkan pesan kesalahan tepat di bawah field input.
* **`hapusError`**: Menghapus pesan kesalahan jika input sudah valid.

```javascript
function initValidasiForm() {
    const form = document.getElementById("form-tambah");
    if (!form) return;

    form.addEventListener("submit", function (e) {
        let valid = true;

        // Validasi Judul / Nama
        const judul = form.querySelector("[name='judul'], [name='nama']");
        if (judul && judul.value.trim() === "") {
            tampilkanError(judul, "Field ini wajib diisi.");
            valid = false;
        } else if (judul) {
            hapusError(judul);
        }

        // Validasi Pengarang, Tahun, dan Stok (jika ada pada form)
        // ... (pengecekan range tahun 1900-2026 dan stok >= 0)

        if (!valid) {
            e.preventDefault();
        }
    });
}

```

* Menghentikan pengiriman form (`e.preventDefault()`) jika ada field wajib yang kosong atau bernilai tidak valid.
* Memvalidasi bidang nama/judul, pengarang, batasan tahun (1900–2026), serta nilai stok non-negatif.

---

### 5. Event Listener DOMContentLoaded

```javascript
document.addEventListener("DOMContentLoaded", function () {
    initNavToggle();
    initHapusConfirm();
    initTableFilter();
    initValidasiForm();
});

```

* Memastikan seluruh modul fungsi dijalankan hanya setelah seluruh elemen dokumen HTML selesai dimuat secara sempurna (`DOMContentLoaded`).

---

### Kesimpulan

File `app.js` bertindak sebagai pusat kendali interaktivitas SIMPUS-Mini. Dengan arsitektur fungsi yang modular, skrip ini secara dinamis menangani manuver navigasi responsive, penghapusan baris tabel, pencarian data instan, dan penanganan error validasi formulir sisi klien.

```

```