<?php
$page_title = 'Transaksi Baru';
require __DIR__ . '/../includes/auth.php';
require __DIR__ . '/../includes/koneksi.php';
require __DIR__ . '/../includes/csrf.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

$pelanggan = $pdo->query(
    'SELECT id, nama, no_pelanggan FROM pelanggan ORDER BY nama'
)->fetchAll();
$layanan = $pdo->query(
    'SELECT id, nama_layanan, harga, durasi FROM layanan ORDER BY nama_layanan'
)->fetchAll();
$karyawan = $pdo->query(
    'SELECT id, nama, no_karyawan, jabatan FROM karyawan ORDER BY nama'
)->fetchAll();

require __DIR__ . '/../includes/header.php';
?>

<section>
    <div class="section-title">
        <span>Transaksi SISALON</span>
        <h2>Buat Transaksi Layanan</h2>
    </div>

    <?php if ($flash): ?>
        <p class="flash flash-<?php echo e($flash['type']); ?>">
            <?php echo e($flash['pesan']); ?>
        </p>
    <?php endif; ?>

    <?php if (!$pelanggan || !$layanan || !$karyawan): ?>
        <p class="flash flash-error">
            Tambahkan minimal satu pelanggan, layanan, dan karyawan sebelum membuat transaksi.
        </p>
    <?php else: ?>
        <form method="post" action="proses_tambah.php">
            <?php echo csrf_field(); ?>

            <p>
                <label for="pelanggan_id">Pelanggan</label><br>
                <select id="pelanggan_id" name="pelanggan_id" required>
                    <option value="">Pilih pelanggan</option>
                    <?php foreach ($pelanggan as $item): ?>
                        <option value="<?php echo e($item['id']); ?>">
                            <?php echo e($item['nama']); ?> (<?php echo e($item['no_pelanggan']); ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </p>

            <p>
                <label for="layanan_id">Layanan</label><br>
                <select id="layanan_id" name="layanan_id" required>
                    <option value="">Pilih layanan</option>
                    <?php foreach ($layanan as $item): ?>
                        <option value="<?php echo e($item['id']); ?>">
                            <?php echo e($item['nama_layanan']); ?> —
                            Rp <?php echo number_format((int) $item['harga'], 0, ',', '.'); ?>,
                            <?php echo e($item['durasi']); ?> menit
                        </option>
                    <?php endforeach; ?>
                </select>
            </p>

            <p>
                <label for="karyawan_id">Karyawan</label><br>
                <select id="karyawan_id" name="karyawan_id" required>
                    <option value="">Pilih karyawan</option>
                    <?php foreach ($karyawan as $item): ?>
                        <option value="<?php echo e($item['id']); ?>">
                            <?php echo e($item['nama']); ?> —
                            <?php echo e($item['jabatan']); ?> (<?php echo e($item['no_karyawan']); ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </p>

            <p><button type="submit">Mulai Layanan</button></p>
        </form>
    <?php endif; ?>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
