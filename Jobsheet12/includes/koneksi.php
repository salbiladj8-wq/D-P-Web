<?php

$localConfig = [];
$localEnvPath = __DIR__ . '/.env';
if (is_file($localEnvPath)) {
    $parsedConfig = parse_ini_file($localEnvPath, false, INI_SCANNER_RAW);
    if (is_array($parsedConfig)) {
        $localConfig = $parsedConfig;
    }
}

$getDatabaseConfig = static function ($environmentName, $localName, $default = '') use ($localConfig) {
    $environmentValue = getenv($environmentName);
    if ($environmentValue !== false && $environmentValue !== '') {
        return $environmentValue;
    }

    return $localConfig[$localName] ?? $default;
};

$host = $getDatabaseConfig('SUPABASE_DB_HOST', 'supabase_host');
$port = $getDatabaseConfig('SUPABASE_DB_PORT', 'supabase_port', '5432');
$db = $getDatabaseConfig('SUPABASE_DB_NAME', 'supabase_database');
$user = $getDatabaseConfig('SUPABASE_DB_USER', 'supabase_user');
$pass = $getDatabaseConfig('SUPABASE_DB_PASSWORD', 'supabase_password');

if ($host === '' || $db === '' || $user === '' || $pass === '') {
    error_log('SISALON database configuration is incomplete.');
    http_response_code(500);
    exit('Konfigurasi database belum lengkap.');
}

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$db;sslmode=require";
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    error_log('SISALON database connection failed: ' . $e->getMessage());
    http_response_code(500);
    exit('Koneksi database gagal. Periksa konfigurasi server.');
}