<?php
$page_title = 'Riwayat Transaksi';
require __DIR__ . '/../includes/auth.php';
require __DIR__ . '/../includes/koneksi.php';

$pelanggan = $pdo->query(
    'SELECT id, nama, no_pelanggan FROM pelanggan ORDER BY nama'
)->fetchAll();
$pelangganId = filter_input(INPUT_GET, 'pelanggan_id', FILTER_VALIDATE_INT);
$riwayat = [];

if ($pelangganId) {
    $stmt = $pdo->prepare(
        'SELECT t.id, t.status, t.waktu_mulai, t.waktu_selesai,
                t.harga_saat_transaksi, t.durasi_saat_transaksi,
                p.nama AS nama_pelanggan, p.no_pelanggan,
                l.nama_layanan,
                k.nama AS nama_karyawan
         FROM transaksi_layanan t
         JOIN pelanggan p ON p.id = t.pelanggan_id
         JOIN layanan l ON l.id = t.layanan_id
         JOIN karyawan k ON k.id = t.karyawan_id
         WHERE t.pelanggan_id = :pelanggan_id
         ORDER BY t.waktu_mulai DESC'
    );
    $stmt->execute(['pelanggan_id' => $pelangganId]);
    $riwayat = $stmt->fetchAll();
}

require __DIR__ . '/../includes/header.php';
?>

<section>
    <div class="section-title">
        <span>Histori Pelanggan</span>
        <h2>Riwayat Transaksi</h2>
    </div>

    <form method="get" class="search-form">
        <div class="search-field">
            <label for="pelanggan_id">Pilih Pelanggan</label>
            <select id="pelanggan_id" name="pelanggan_id" required>
                <option value="">Pilih pelanggan</option>
                <?php foreach ($pelanggan as $item): ?>
                    <option value="<?php echo e($item['id']); ?>" <?php echo (int) $pelangganId === (int) $item['id'] ? 'selected' : ''; ?>>
                        <?php echo e($item['nama']); ?> (<?php echo e($item['no_pelanggan']); ?>)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit">Tampilkan Riwayat</button>
    </form>

    <?php if ($pelangganId): ?>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Layanan</th>
                        <th>Karyawan</th>
                        <th>Mulai</th>
                        <th>Selesai</th>
                        <th>Durasi</th>
                        <th>Harga</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!$riwayat): ?>
                        <tr><td colspan="7">Belum ada riwayat transaksi untuk pelanggan ini.</td></tr>
                    <?php else: ?>
                        <?php foreach ($riwayat as $transaksi): ?>
                            <tr>
                                <td><?php echo e($transaksi['nama_layanan']); ?></td>
                                <td><?php echo e($transaksi['nama_karyawan']); ?></td>
                                <td><?php echo e(date('d-m-Y H:i', strtotime($transaksi['waktu_mulai']))); ?></td>
                                <td>
                                    <?php echo $transaksi['waktu_selesai']
                                        ? e(date('d-m-Y H:i', strtotime($transaksi['waktu_selesai'])))
                                        : '—'; ?>
                                </td>
                                <td><?php echo e($transaksi['durasi_saat_transaksi']); ?> menit</td>
                                <td>Rp <?php echo number_format((int) $transaksi['harga_saat_transaksi'], 0, ',', '.'); ?></td>
                                <td><?php echo $transaksi['status'] === 'selesai' ? 'Selesai' : 'Berlangsung'; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
