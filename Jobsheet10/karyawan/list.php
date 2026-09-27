<?php

$page_title = "Daftar Karyawan";

include __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/koneksi.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

$q = trim($_GET['q'] ?? '');
$halaman = max(1, (int) ($_GET['halaman'] ?? 1));
$perHalaman = 5;
$hitung = $pdo->prepare("SELECT COUNT(*) FROM karyawan WHERE nama ILIKE :kw");
$hitung->execute(['kw' => "%$q%"]);
$totalData = (int) $hitung->fetchColumn();
$totalHalaman = max(1, (int) ceil($totalData / $perHalaman));
$halaman = min($halaman, $totalHalaman);
$offset = ($halaman - 1) * $perHalaman;
$stmt = $pdo->prepare(
    "SELECT * FROM karyawan WHERE nama ILIKE :kw ORDER BY id DESC LIMIT :limit OFFSET :offset"
);
$stmt->bindValue(':kw', "%$q%", PDO::PARAM_STR);
$stmt->bindValue(':limit', $perHalaman, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$daftarKaryawan = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<section>

    <div class="section-title">
        <span>Karyawan</span>
        <h2>Daftar Karyawan</h2>
    </div>

    <?php if ($flash): ?>

        <p class="flash flash-<?php echo $flash['type']; ?>">
            <?php echo htmlspecialchars($flash['pesan']); ?>
        </p>

    <?php endif; ?>

    <div class="search-box">

        <form class="search-form" method="get">
            <div class="search-field">
                <label for="search-input">Cari Nama Karyawan</label>
                <input type="text" id="search-input" name="q" value="<?php echo $q; ?>" placeholder="Ketik nama karyawan...">
            </div>
            <button type="submit">Cari</button>
        </form>

    </div>

    <div class="table-responsive">

        <table>

            <thead>

                <tr>
                    <th>No. Karyawan</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>No. HP</th>
                    <th>Aksi</th>
                </tr>

            </thead>

            <tbody>

                <?php if (empty($daftarKaryawan)): ?>

                    <tr>

                        <td colspan="5">
                            Belum ada data karyawan.
                            Silakan tambah lewat menu
                            "Tambah Karyawan".
                        </td>

                    </tr>

                <?php else: ?>

                    <?php foreach ($daftarKaryawan as $karyawan): ?>

                        <tr>

                            <td>
                                <?php
                                echo htmlspecialchars(
                                    $karyawan['no_karyawan']
                                );
                                ?>
                            </td>

                            <td>
                                <?php
                                echo htmlspecialchars(
                                    $karyawan['nama']
                                );
                                ?>
                            </td>

                            <td>
                                <?php
                                echo htmlspecialchars(
                                    $karyawan['jabatan']
                                );
                                ?>
                            </td>

                            <td>
                                <?php
                                echo htmlspecialchars(
                                    $karyawan['no_hp']
                                );
                                ?>
                            </td>

                            <td>
                                <div class="action-buttons">
                                    <a href="edit.php?id=<?php echo $karyawan['id']; ?>" class="btn-edit">Edit</a>
                                    <form class="form-hapus" method="post" action="hapus.php">
                                        <input type="hidden" name="id" value="<?php echo $karyawan['id']; ?>">
                                        <button type="submit" class="btn-hapus">Hapus</button>
                                    </form>
                                </div>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

    <?php if ($totalHalaman > 1): ?>
        <nav class="pagination" aria-label="Navigasi halaman">
            <?php for ($nomor = 1; $nomor <= $totalHalaman; $nomor++): ?>
                <a class="<?php echo $nomor === $halaman ? 'active' : ''; ?>" href="?q=<?php echo urlencode($q); ?>&amp;halaman=<?php echo $nomor; ?>"><?php echo $nomor; ?></a>
            <?php endfor; ?>
        </nav>
    <?php endif; ?>

</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>