<?php
$page_title = 'Layanan Berlangsung';
require __DIR__ . '/../includes/auth.php';
require __DIR__ . '/../includes/koneksi.php';
require __DIR__ . '/../includes/csrf.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

$daftarTransaksi = $pdo->query(
    "SELECT t.id, t.waktu_mulai, t.harga_saat_transaksi, t.durasi_saat_transaksi,
            p.nama AS nama_pelanggan, p.no_pelanggan,
            l.nama_layanan,
            k.nama AS nama_karyawan
     FROM transaksi_layanan t
     JOIN pelanggan p ON p.id = t.pelanggan_id
     JOIN layanan l ON l.id = t.layanan_id
     JOIN karyawan k ON k.id = t.karyawan_id
     WHERE t.status = 'berlangsung'
     ORDER BY t.waktu_mulai ASC"
)->fetchAll();

require __DIR__ . '/../includes/header.php';
?>

<section>
    <div class="section-title">
        <span>Transaksi Aktif</span>
        <h2>Layanan Berlangsung</h2>
    </div>

    <?php if ($flash): ?>
        <p class="flash flash-<?php echo e($flash['type']); ?>">
            <?php echo e($flash['pesan']); ?>
        </p>
    <?php endif; ?>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Pelanggan</th>
                    <th>Layanan</th>
                    <th>Karyawan</th>
                    <th>Mulai</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!$daftarTransaksi): ?>
                    <tr><td colspan="6">Tidak ada layanan yang sedang berlangsung.</td></tr>
                <?php else: ?>
                    <?php foreach ($daftarTransaksi as $transaksi): ?>
                        <tr>
                            <td>
                                <?php echo e($transaksi['nama_pelanggan']); ?>
                                (<?php echo e($transaksi['no_pelanggan']); ?>)
                            </td>
                            <td>
                                <?php echo e($transaksi['nama_layanan']); ?>
                                (<?php echo e($transaksi['durasi_saat_transaksi']); ?> menit)
                            </td>
                            <td><?php echo e($transaksi['nama_karyawan']); ?></td>
                            <td><?php echo e(date('d-m-Y H:i', strtotime($transaksi['waktu_mulai']))); ?></td>
                            <td>Rp <?php echo number_format((int) $transaksi['harga_saat_transaksi'], 0, ',', '.'); ?></td>
                            <td>
                                <form method="post" action="proses_selesai.php">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="id" value="<?php echo e($transaksi['id']); ?>">
                                    <button type="submit">Selesaikan Layanan</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
