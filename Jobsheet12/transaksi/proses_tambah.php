<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require __DIR__ . '/../includes/auth.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    header('Allow: POST');
    exit('Metode tidak diizinkan.');
}

require __DIR__ . '/../includes/helpers.php';
require __DIR__ . '/../includes/csrf.php';
if (!csrf_verify()) {
    header('Location: tambah.php');
    exit;
}

$pelangganId = filter_input(INPUT_POST, 'pelanggan_id', FILTER_VALIDATE_INT);
$layananId = filter_input(INPUT_POST, 'layanan_id', FILTER_VALIDATE_INT);
$karyawanId = filter_input(INPUT_POST, 'karyawan_id', FILTER_VALIDATE_INT);

if (!$pelangganId || !$layananId || !$karyawanId) {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => 'Pilih pelanggan, layanan, dan karyawan yang valid.'];
    header('Location: tambah.php');
    exit;
}

require __DIR__ . '/../includes/koneksi.php';

try {
    $pdo->beginTransaction();

    $pilihan = $pdo->prepare(
        'SELECT l.harga, l.durasi
         FROM layanan l
         JOIN pelanggan p ON p.id = :pelanggan_id
         JOIN karyawan k ON k.id = :karyawan_id
         WHERE l.id = :layanan_id
         FOR UPDATE OF l, p, k'
    );
    $pilihan->execute([
        'pelanggan_id' => $pelangganId,
        'karyawan_id' => $karyawanId,
        'layanan_id' => $layananId,
    ]);
    $detailLayanan = $pilihan->fetch();

    if (!$detailLayanan) {
        $pdo->rollBack();
        $_SESSION['flash'] = ['type' => 'error', 'pesan' => 'Data pelanggan, layanan, atau karyawan tidak ditemukan.'];
        header('Location: tambah.php');
        exit;
    }

    $simpan = $pdo->prepare(
        "INSERT INTO transaksi_layanan
            (pelanggan_id, layanan_id, karyawan_id, harga_saat_transaksi, durasi_saat_transaksi)
         VALUES
            (:pelanggan_id, :layanan_id, :karyawan_id, :harga, :durasi)"
    );
    $simpan->execute([
        'pelanggan_id' => $pelangganId,
        'layanan_id' => $layananId,
        'karyawan_id' => $karyawanId,
        'harga' => $detailLayanan['harga'],
        'durasi' => $detailLayanan['durasi'],
    ]);

    $pdo->commit();
    $_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Transaksi layanan berhasil dimulai.'];
    header('Location: selesai.php');
    exit;
} catch (Throwable $exception) {
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }

    error_log('Creating SISALON transaction failed: ' . $exception->getMessage());
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => 'Transaksi tidak dapat disimpan. Periksa koneksi dan skema database.'];
    header('Location: tambah.php');
    exit;
}
