# Wireframe & User Flow — SIMPUS-Mini

SIMPUS-Mini merupakan aplikasi perpustakaan sederhana untuk mengelola data
buku dan anggota perpustakaan.

## 1. Struktur Navigasi

```text
                    [ Beranda ]
                        |
              +---------+---------+
              |                   |
         [ Daftar Buku ]    [ Daftar Anggota ]
              |                   |
         [ Tambah Buku ]    [ Tambah Anggota ]
````

Menu utama:

* Beranda
* Daftar Buku
* Tambah Buku
* Daftar Anggota
* Tambah Anggota

---

## 2. User Flow — Tambah Buku

```text
[ Beranda / Daftar Buku ]
          |
          v
    [ Tambah Buku ]
          |
          v
     [ Isi Form ]
          |
          v
     [ Klik Simpan ]
          |
          v
   [ Validasi PHP ]
       /       \
    Gagal    Berhasil
      |          |
      v          v
[Flash Error] [Session Buku]
                   |
                   v
             [ Daftar Buku ]
```

## 3. User Flow — Tambah Anggota

```text
[ Beranda / Daftar Anggota ]
            |
            v
      [ Tambah Anggota ]
            |
            v
        [ Isi Form ]
            |
            v
       [ Klik Simpan ]
            |
            v
       [ Validasi PHP ]
          /       \
       Gagal     Berhasil
         |           |
         v           v
   [Flash Error] [Session Anggota]
                      |
                      v
                [ Daftar Anggota ]
```

---

## 4. Wireframe — Beranda

```text
+------------------------------------------------------+
| SIMPUS-Mini              Beranda | Buku | Anggota    |
+------------------------------------------------------+
|                                                      |
|                         👋                           |
|              Selamat Datang di Perpustakaan         |
|       Aplikasi sederhana untuk mengelola data        |
|              buku dan anggota perpustakaan.          |
|                                                      |
|                 Informasi Perpustakaan              |
|                                                      |
|   +------------+ +------------+ +------------+       |
|   | Total Buku | |   Total    | |   Sedang   |       |
|   |     10     | |  Anggota 7 | |  Dipinjam  |       |
|   +------------+ +------------+ +------------+       |
|                                                      |
+------------------------------------------------------+
```

---

## 5. Wireframe — Daftar Buku

```text
+------------------------------------------------------+
| SIMPUS-Mini              Beranda | Buku | Anggota    |
+------------------------------------------------------+
|                                                      |
|                     Daftar Buku                      |
|                                                      |
| Cari Judul Buku                                      |
| [______________________________________________]     |
|                                                      |
| +------------------------------------------------+   |
| | Judul | Pengarang | Tahun | Stok | Aksi        |   |
| +------------------------------------------------+   |
| | Laskar Pelangi | Andrea Hirata | 2005 | 4 | ... |  |
| | Bumi Manusia   | Pramoedya     | 1980 | 2 | ... |  |
| | ...            | ...           | ...  | ...| ... |  |
| +------------------------------------------------+   |
|                                                      |
+------------------------------------------------------+
```

---

## 6. Wireframe — Tambah Buku

```text
+------------------------------------------------------+
|                    Tambah Buku                       |
+------------------------------------------------------+
|                                                      |
| Judul       [____________________________]           |
| Pengarang   [____________________________]           |
| Tahun       [____________________________]           |
| ISBN        [____________________________]           |
| Stok        [____________________________]           |
| Kategori    [______________v]                        |
|                                                      |
|                    [ Simpan ]                        |
|                                                      |
+------------------------------------------------------+
```

---

## 7. Wireframe — Daftar Anggota

```text
+------------------------------------------------------+
| SIMPUS-Mini              Beranda | Buku | Anggota    |
+------------------------------------------------------+
|                                                      |
|                   Daftar Anggota                    |
|                                                      |
| Cari Nama Anggota                                    |
| [______________________________________________]     |
|                                                      |
| +------------------------------------------------+   |
| | No. Anggota | Nama | Alamat | No. HP | Aksi   |   |
| +------------------------------------------------+   |
| | A001 | Siti Aminah | Malang | 0812xxxx | ...  |   |
| | A002 | Budi Santoso| Batu   | 0813xxxx | ...  |   |
| | ...  | ...         | ...    | ...      | ...  |   |
| +------------------------------------------------+   |
|                                                      |
+------------------------------------------------------+
```

---

## 8. Wireframe — Tambah Anggota

```text
+------------------------------------------------------+
|                   Tambah Anggota                     |
+------------------------------------------------------+
|                                                      |
| Nama         [____________________________]          |
| No. Anggota [____________________________]          |
| Alamat       [____________________________]          |
| No. HP       [____________________________]          |
|                                                      |
|                    [ Simpan ]                        |
|                                                      |
+------------------------------------------------------+

---

## 9. Catatan Implementasi

- Data buku disimpan sementara menggunakan `$_SESSION['buku']`.
- Data anggota disimpan sementara menggunakan `$_SESSION['anggota']`.
- Form menggunakan metode `POST`.
- Data divalidasi kembali menggunakan PHP sebelum disimpan.
- Flash message digunakan untuk memberikan informasi berhasil atau gagal.
- Tampilan dibuat responsif untuk desktop dan perangkat dengan layar lebih kecil.
```