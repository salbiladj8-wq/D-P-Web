<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    $appRoot = rtrim(dirname(dirname($_SERVER['SCRIPT_NAME'])), '/\\');
    header('Location: ' . $appRoot . '/auth/login.php');
    exit;
}