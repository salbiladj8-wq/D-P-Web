# Perkembangan SIMPUS-Mini dari Jobsheet 6 ke Jobsheet 7

Pada Jobsheet 7, SIMPUS-Mini dikembangkan dari versi sebelumnya pada Jobsheet 6 dengan menambahkan pengolahan data menggunakan PHP serta melakukan beberapa penyesuaian pada tampilan antarmuka.

### 1. Perubahan dari HTML menjadi PHP

Pada Jobsheet 6, halaman aplikasi masih menggunakan file HTML. Pada Jobsheet 7, halaman tersebut diubah menjadi PHP agar dapat menjalankan proses di sisi server.

Perubahan dilakukan pada halaman:

* `index.html` → `index.php`
* `buku/list.html` → `buku/list.php`
* `buku/tambah.html` → `buku/tambah.php`
* `anggota/list.html` → `anggota/list.php`
* `anggota/tambah.html` → `anggota/tambah.php`

### 2. Penambahan Header dan Footer

Pada JS7 ditambahkan:

```text
includes/
├── header.php
└── footer.php
```

Header dan footer digunakan bersama pada setiap halaman menggunakan `include`, sehingga kode menjadi lebih terstruktur dan tidak perlu menuliskan bagian yang sama berulang kali.

### 3. Pengolahan Data Menggunakan PHP Session

Pada JS6, data masih berupa data yang telah disediakan sebelumnya. Pada JS7, data yang ditambahkan melalui form dapat disimpan sementara menggunakan PHP Session.

Data buku disimpan pada:

```php
$_SESSION['buku']
```

sedangkan data anggota disimpan pada:

```php
$_SESSION['anggota']
```

Data tersebut kemudian ditampilkan kembali pada halaman daftar menggunakan `foreach`.

### 4. Penambahan Proses Tambah Data

Form tambah buku dan anggota pada JS7 sudah menggunakan metode `POST` dan diproses melalui file:

```text
buku/proses_tambah.php
anggota/proses_tambah.php
```

Setelah data berhasil diproses, pengguna diarahkan kembali ke halaman daftar dan data baru langsung ditampilkan.

### 5. Validasi Server-Side

Selain validasi JavaScript yang sudah ada sebelumnya, JS7 menambahkan validasi menggunakan PHP.

Validasi dilakukan untuk memastikan data yang dikirim tetap sesuai meskipun validasi JavaScript dilewati.

Contohnya:

* Judul dan pengarang buku wajib diisi.
* Tahun buku harus berada pada rentang 1900–2026.
* Stok tidak boleh negatif.
* Nama dan nomor anggota wajib diisi.

### 6. Flash Message

JS7 menambahkan flash message menggunakan session untuk memberikan informasi kepada pengguna setelah proses dilakukan.

Contohnya:

> Buku berhasil ditambahkan.

atau ketika terdapat kesalahan:

> Judul wajib diisi.

### 7. Perubahan dan Pengembangan Tampilan

Selain perubahan pada fungsi sistem, **tampilan SIMPUS-Mini juga kembali diperbarui pada JS7**.

Pada JS6, tampilan sudah memiliki desain dan warna tersendiri. Pada JS7, desain tersebut **tidak hanya diteruskan**, tetapi disesuaikan kembali agar terlihat lebih menarik dan nyaman digunakan.

Perubahan yang dilakukan meliputi:

* Menggunakan **warna yang lebih soft dan pastel**.
* Menyesuaikan kembali bentuk beberapa komponen agar lebih modern.
* Membuat bagian beranda lebih menarik.
* Menyesuaikan tampilan card, form, tabel, dan navigasi.
* Mempertahankan tampilan responsif agar tetap nyaman pada ukuran layar yang berbeda.

Jadi, perubahan desain pada JS7 merupakan **pengembangan visual dari JS6**, dengan tujuan membuat SIMPUS-Mini memiliki tampilan yang lebih lembut, menarik, dan nyaman digunakan.

### 8. Penghapusan File yang Tidak Digunakan

Karena pengolahan data pada JS7 sudah dilakukan oleh PHP, file yang sebelumnya digunakan untuk pengelolaan data tidak lagi diperlukan.

File yang dihapus:

```text
assets/js/buku.js
assets/js/anggota.js
data/
```

Sedangkan `assets/js/app.js` tetap digunakan untuk interaksi antarmuka seperti menu, pencarian, konfirmasi, dan validasi client-side.

### 9. Hasil Pengembangan

Setelah perubahan dari JS6 ke JS7, SIMPUS-Mini sudah dapat:

* Menampilkan data buku dan anggota.
* Menambahkan buku melalui form.
* Menambahkan anggota melalui form.
* Menyimpan data sementara menggunakan Session.
* Melakukan validasi menggunakan PHP.
* Menampilkan flash message.
* Menampilkan data dinamis menggunakan `foreach`.
* Menggunakan header dan footer secara terpusat.
* Memiliki tampilan yang lebih **soft, menarik, dan responsif**.

**Kesimpulan:**
Pengembangan dari JS6 ke JS7 tidak hanya menambahkan fungsi PHP dan pengolahan data, tetapi juga melakukan penyempurnaan tampilan. Dengan demikian, SIMPUS-Mini pada JS7 menjadi lebih dinamis dari sisi fungsi sekaligus lebih menarik dan nyaman dari sisi antarmuka.