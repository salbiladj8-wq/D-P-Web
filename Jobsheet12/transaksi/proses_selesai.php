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
    header('Location: selesai.php');
    exit;
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => 'Transaksi tidak valid.'];
    header('Location: selesai.php');
    exit;
}

require __DIR__ . '/../includes/koneksi.php';

try {
    $pdo->beginTransaction();
    $verifikasi = $pdo->prepare(
        "SELECT id FROM transaksi_layanan WHERE id = :id AND status = 'berlangsung' FOR UPDATE"
    );
    $verifikasi->execute(['id' => $id]);

    if (!$verifikasi->fetch()) {
        $pdo->rollBack();
        $_SESSION['flash'] = ['type' => 'error', 'pesan' => 'Transaksi tidak ditemukan atau sudah diselesaikan.'];
        header('Location: selesai.php');
        exit;
    }

    $selesaikan = $pdo->prepare(
        "UPDATE transaksi_layanan
         SET status = 'selesai', waktu_selesai = CURRENT_TIMESTAMP
         WHERE id = :id"
    );
    $selesaikan->execute(['id' => $id]);

    $pdo->commit();
    $_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Layanan berhasil diselesaikan.'];
} catch (Throwable $exception) {
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }

    error_log('Completing SISALON transaction failed: ' . $exception->getMessage());
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => 'Transaksi tidak dapat diselesaikan. Periksa koneksi dan skema database.'];
}

header('Location: selesai.php');
exit;
