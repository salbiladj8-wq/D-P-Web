<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    header('Allow: POST');
    exit('Metode tidak diizinkan.');
}

$nama = trim($_POST['nama'] ?? '');
$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

if ($nama === '' || $username === '' || $password === '') {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => 'Semua kolom wajib diisi.'];
    header('Location: register.php');
    exit;
}

if (strlen($nama) > 100 || strlen($username) > 50 || strlen($password) < 8) {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => 'Nama atau username terlalu panjang, atau password kurang dari 8 karakter.'];
    header('Location: register.php');
    exit;
}

require __DIR__ . '/../includes/koneksi.php';

$check = $pdo->prepare('SELECT 1 FROM users WHERE username = :username');
$check->execute(['username' => $username]);
if ($check->fetchColumn()) {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => 'Username sudah digunakan.'];
    header('Location: register.php');
    exit;
}

$passwordHash = password_hash($password, PASSWORD_DEFAULT);
$insert = $pdo->prepare(
    "INSERT INTO users (nama, username, password, role)
     VALUES (:nama, :username, :password, 'petugas')"
);
$insert->execute([
    'nama' => $nama,
    'username' => $username,
    'password' => $passwordHash,
]);

$_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Akun berhasil dibuat. Silakan login.'];
header('Location: login.php');
exit;