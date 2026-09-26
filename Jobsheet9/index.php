<?php
$page_title = "Beranda";
require __DIR__ . '/includes/koneksi.php';

$totalLayanan = $pdo->query("SELECT COUNT(*) FROM layanan")->fetchColumn();
$totalPelanggan = $pdo->query("SELECT COUNT(*) FROM pelanggan")->fetchColumn();
$totalKaryawan = $pdo->query("SELECT COUNT(*) FROM karyawan")->fetchColumn();

require __DIR__ . '/includes/header.php';
?>

<section class="welcome-section">
    <span class="welcome-label">SALON MANAGEMENT SYSTEM</span>
    <h2>SISALON</h2>
    <h3 class="creator-name">Salbila Dwi Juniar</h3>
    <p>
        Sistem informasi salon sederhana untuk membantu
        mengelola data layanan, pelanggan, dan karyawan
        dengan lebih terorganisir.
    </p>
</section>

<section>
    <div class="section-title">
        <span>Ringkasan</span>
        <h2>Data SISALON</h2>
    </div>

    <div class="summary-list">
        <div class="summary-card">
            <div><h3>Total Layanan</h3><p><?= $totalLayanan ?></p></div>
        </div>
        <div class="summary-card">
            <div><h3>Total Pelanggan</h3><p><?= $totalPelanggan ?></p></div>
        </div>
        <div class="summary-card">
            <div><h3>Total Karyawan</h3><p><?= $totalKaryawan ?></p></div>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>