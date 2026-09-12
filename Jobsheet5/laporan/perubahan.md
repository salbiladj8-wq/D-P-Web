# Laporan Perubahan SIMPUS-Mini

**Jobsheet 5 — JavaScript DOM & Event**
**Sub-CPMK:** Menerapkan manipulasi DOM & event JavaScript.

### Perubahan dari Jobsheet 4

* **Penambahan File JavaScript:** Membuat file baru `assets/js/app.js` untuk memisahkan seluruh logika interaktivitas.
* **Hamburger Menu:** Mengganti metode navigasi mobile dari *checkbox hack* (murni CSS) menjadi menggunakan tombol dan JavaScript (`nav.classList.toggle("nav-open")`).
* **Validasi Form (Tambah Buku & Anggota):** Mengimplementasikan validasi *client-side* (`initValidasiForm`) untuk memeriksa *field* wajib, rentang tahun terbit, dan memastikan stok bernilai non-negatif. Pesan *error* ditampilkan secara *inline* melalui manipulasi DOM (`insertAdjacentElement`).
* **Filter Tabel (Daftar Buku & Anggota):** Menambahkan kolom pencarian *real-time* (`initTableFilter`) yang langsung menyaring baris tabel saat pengguna mengetik (menggunakan *event* `keyup`).
* **Aksi Tombol Hapus (`.btn-hapus`):** Memunculkan dialog `confirm()` saat tombol hapus diklik, kemudian menghapus baris terkait dari tampilan UI jika disetujui (masih sebatas *front-end*, belum terhubung ke *server*).

### Cara Menjalankan

1. Buka file `index.html` menggunakan browser.
2. **Uji Form:** Coba *submit* formulir Tambah Buku atau Tambah Anggota dalam keadaan kosong, maka pesan *error* akan muncul.
3. **Uji Pencarian:** Ketikkan kata kunci di kolom pencarian pada halaman Daftar Buku/Anggota untuk melihat tabel tersaring secara otomatis.
4. **Uji Penghapusan:** Klik tombol Hapus pada salah satu baris data, konfirmasi pop-up yang muncul, dan lihat baris tersebut hilang dari tabel.

### Catatan

* Validasi pada jobsheet ini murni *client-side* dan masih bisa dilewati jika JavaScript dinonaktifkan pada browser. Validasi *server-side* akan ditambahkan pada Jobsheet 7 sebagai lapisan perlindungan kedua yang wajib.
* Penghapusan baris pada jobsheet ini hanya bersifat sementara (menghilangkan dari tampilan UI). Proses penghapusan data secara permanen ke *database* akan mulai diimplementasikan pada Jobsheet 9.