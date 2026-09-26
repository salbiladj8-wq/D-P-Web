<?php
/**
 * Unified Serverless PHP Gateway for Vercel
 * Menangani routing dinamis untuk Jobsheet new (SiSalon), Jobsheet 7, Jobsheet 8,
 * serta berkas PHP / statis lainnya saat di-deploy ke Vercel.
 */

$rawUri = $_SERVER['REQUEST_URI'] ?? '/';
$path = parse_url($rawUri, PHP_URL_PATH);
$path = urldecode($path);

// Root path -> Beranda
if ($path === '/' || $path === '' || $path === '/index.html') {
    $indexPath = realpath(__DIR__ . '/../index.html');
    if ($indexPath && is_file($indexPath)) {
        header('Content-Type: text/html; charset=UTF-8');
        readfile($indexPath);
        exit;
    }
}

// Normalisasi alias rute
$aliasMap = [
    '/jobsheet-new'         => '/Jobsheet new',
    '/jobsheet_new'         => '/Jobsheet new',
    '/sisalon'              => '/Jobsheet new',
    '/jobsheet-3-bootstrap' => '/Jobsheet 3 Bootstrap',
    '/jobsheet3-bootstrap'  => '/Jobsheet 3 Bootstrap',
    '/jobsheet1'            => '/Jobsheet1',
    '/jobsheet2'            => '/Jobsheet2',
    '/jobsheet3'            => '/Jobsheet3',
    '/jobsheet4'            => '/Jobsheet4',
    '/jobsheet5'            => '/Jobsheet5',
    '/jobsheet6'            => '/Jobsheet6',
    '/jobsheet7'            => '/Jobsheet7',
    '/jobsheet8'            => '/Jobsheet8',
    '/jobsheet9'            => '/Jobsheet9',
    '/handbook'             => '/handbook',
];

$resolvedPath = $path;
foreach ($aliasMap as $prefix => $targetPrefix) {
    if ($path === $prefix) {
        $resolvedPath = $targetPrefix;
        break;
    }
    if (strpos($path, $prefix . '/') === 0) {
        $resolvedPath = $targetPrefix . substr($path, strlen($prefix));
        break;
    }
}

$rootDir = realpath(__DIR__ . '/..');
$target = $rootDir . $resolvedPath;

// Jika direktori, periksa index.php atau index.html
if (is_dir($target)) {
    if (is_file($target . '/index.php')) {
        $target = $target . '/index.php';
        $resolvedPath = rtrim($resolvedPath, '/') . '/index.php';
    } elseif (is_file($target . '/index.html')) {
        $target = $target . '/index.html';
        $resolvedPath = rtrim($resolvedPath, '/') . '/index.html';
    }
}

// Jika tanpa ekstensi tapi file .php atau .html tersedia
if (!is_file($target)) {
    if (is_file($target . '.php')) {
        $target = $target . '.php';
        $resolvedPath .= '.php';
    } elseif (is_file($target . '.html')) {
        $target = $target . '.html';
        $resolvedPath .= '.html';
    }
}

$realTarget = realpath($target);

// Keamanan: pastikan target berada dalam root directory
if (!$realTarget || strpos($realTarget, $rootDir) !== 0 || !is_file($realTarget)) {
    http_response_code(404);
    header('Content-Type: text/html; charset=UTF-8');
    echo "<!DOCTYPE html><html><head><meta charset='UTF-8'><title>404 Not Found</title>";
    echo "<style>body{font-family:sans-serif;text-align:center;padding:50px;background:#0f172a;color:#e2e8f0;} a{color:#38bdf8;text-decoration:none;}</style></head>";
    echo "<body><h1>404 - Halaman Tidak Ditemukan</h1>";
    echo "<p>Jalur yang diminta: <code>" . htmlspecialchars($path) . "</code> tidak tersedia.</p>";
    echo "<p><a href='/'>&larr; Kembali ke Portal Praktikum</a></p></body></html>";
    exit;
}

$ext = strtolower(pathinfo($realTarget, PATHINFO_EXTENSION));

// Jika file PHP, eksekusi
if ($ext === 'php') {
    // Ubah direktori kerja ke folder file agar include/require lokal berfungsi
    chdir(dirname($realTarget));

    // Sinkronkan variabel server untuk konsistensi script
    $_SERVER['SCRIPT_FILENAME'] = $realTarget;
    $_SERVER['SCRIPT_NAME']     = $resolvedPath;
    $_SERVER['PHP_SELF']        = $resolvedPath;

    require $realTarget;
    exit;
}

// Jika file statis (CSS, JS, gambar, dll.)
$mimeTypes = [
    'css'   => 'text/css; charset=UTF-8',
    'js'    => 'application/javascript; charset=UTF-8',
    'json'  => 'application/json; charset=UTF-8',
    'html'  => 'text/html; charset=UTF-8',
    'htm'   => 'text/html; charset=UTF-8',
    'png'   => 'image/png',
    'jpg'   => 'image/jpeg',
    'jpeg'  => 'image/jpeg',
    'gif'   => 'image/gif',
    'svg'   => 'image/svg+xml',
    'ico'   => 'image/x-icon',
    'woff'  => 'font/woff',
    'woff2' => 'font/woff2',
    'ttf'   => 'font/ttf',
    'eot'   => 'application/vnd.ms-fontobject',
    'md'    => 'text/markdown; charset=UTF-8',
];

$mime = $mimeTypes[$ext] ?? 'application/octet-stream';
header('Content-Type: ' . $mime);
header('Content-Length: ' . filesize($realTarget));
readfile($realTarget);
exit;
