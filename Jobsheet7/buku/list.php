<?php
$page_title = "Daftar Buku";
include __DIR__ . '/../includes/header.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

if (!isset($_SESSION['buku'])) {
    $_SESSION['buku'] = [
        ['judul' => 'Laskar Pelangi', 'pengarang' => 'Andrea Hirata', 'tahun' => 2005, 'isbn' => '', 'stok' => 4, 'kategori' => 'fiksi'],
        ['judul' => 'Bumi Manusia', 'pengarang' => 'Pramoedya Ananta Toer', 'tahun' => 1980, 'isbn' => '', 'stok' => 2, 'kategori' => 'fiksi'],
        ['judul' => 'Negeri 5 Menara', 'pengarang' => 'Ahmad Fuadi', 'tahun' => 2009, 'isbn' => '', 'stok' => 0, 'kategori' => 'fiksi'],
        ['judul' => 'Filosofi Teras', 'pengarang' => 'Henry Manampiring', 'tahun' => 2018, 'isbn' => '', 'stok' => 5, 'kategori' => 'non-fiksi'],
        ['judul' => 'Ronggeng Dukuh Paruk', 'pengarang' => 'Ahmad Tohari', 'tahun' => 1982, 'isbn' => '', 'stok' => 1, 'kategori' => 'fiksi'],
        ['judul' => 'Ayat-Ayat Cinta', 'pengarang' => 'Habiburrahman El Shirazy', 'tahun' => 2004, 'isbn' => '', 'stok' => 1, 'kategori' => 'fiksi'],
        ['judul' => 'Perahu Kertas', 'pengarang' => 'Dee Lestari', 'tahun' => 2009, 'isbn' => '', 'stok' => 1, 'kategori' => 'fiksi'],
        ['judul' => 'Dilan 1990', 'pengarang' => 'Pidi Baiq', 'tahun' => 2014, 'isbn' => '', 'stok' => 1, 'kategori' => 'fiksi'],
        ['judul' => 'Hujan', 'pengarang' => 'Tere Liye', 'tahun' => 2016, 'isbn' => '', 'stok' => 1, 'kategori' => 'fiksi'],
        ['judul' => 'Garis Waktu', 'pengarang' => 'Fiersa Besari', 'tahun' => 2016, 'isbn' => '', 'stok' => 1, 'kategori' => 'fiksi']
    ];
}

$daftarBuku = $_SESSION['buku'];
?>

<section>
    <h2>Daftar Buku</h2>

    <?php if ($flash): ?>
        <p class="flash flash-<?php echo $flash['type']; ?>"><?php echo $flash['pesan']; ?></p>
    <?php endif; ?>

    <div class="search-box">
        <label for="search-input">Cari Judul Buku</label>
        <input type="text" id="search-input" placeholder="Ketik judul buku...">
    </div>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Tahun</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($daftarBuku as $buku): ?>
                <tr>
                    <td><?php echo $buku['judul']; ?></td>
                    <td><?php echo $buku['pengarang']; ?></td>
                    <td><?php echo $buku['tahun']; ?></td>
                    <td><?php echo $buku['stok']; ?></td>
                    <td>
                        <button type="button">Edit</button>
                        <button type="button" class="btn-hapus">Hapus</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>