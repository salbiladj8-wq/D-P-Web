<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    header('Allow: POST');
    exit('Metode tidak diizinkan.');
}

require __DIR__ . '/../includes/csrf.php';
if (!csrf_verify()) {
    header('Location: login.php');
    exit;
}

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

require __DIR__ . '/../includes/koneksi.php';

try {
    $stmt = $pdo->prepare('SELECT id, nama, username, password, role FROM users WHERE username = :username');
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();
} catch (PDOException $exception) {
    error_log('Login failed: ' . $exception->getMessage());
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => 'Login belum dapat diproses. Pastikan skema akun database sudah disiapkan.'];
    header('Location: login.php');
    exit;
}

if (!$user || !password_verify($password, $user['password'])) {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => 'Username atau password salah.'];
    header('Location: login.php');
    exit;
}

session_regenerate_id(true);
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['nama'];
$_SESSION['user_role'] = $user['role'];

header('Location: ../index.php');
exit;