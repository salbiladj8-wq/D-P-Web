<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    header('Allow: POST');
    exit('Metode tidak diizinkan.');
}

session_start();
require __DIR__ . '/../includes/koneksi.php';

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => 'ID pelanggan tidak valid.'];
    header('Location: list.php');
    exit;
}

$stmt = $pdo->prepare("DELETE FROM pelanggan WHERE id = :id");
$stmt->execute(['id' => $id]);

$_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Pelanggan berhasil dihapus.'];
header('Location: list.php');
exit;