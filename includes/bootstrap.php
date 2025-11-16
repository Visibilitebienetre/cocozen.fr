<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/database.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$cmsContent = load_content();

function load_content(): array
{
    $pdo = cms_db();
    $stmt = $pdo->query('SELECT content_key, content_value FROM cms_content ORDER BY content_key');
    $rows = $stmt->fetchAll();

    $data = [];
    foreach ($rows as $row) {
        $data[$row['content_key']] = $row['content_value'];
    }

    return $data;
}

function save_content(array $data): bool
{
    $pdo = cms_db();

    try {
        $pdo->beginTransaction();
        $stmt = $pdo->prepare('REPLACE INTO cms_content (content_key, content_value) VALUES (:key, :value)');
        foreach ($data as $key => $value) {
            $stmt->execute([
                ':key' => $key,
                ':value' => (string) $value,
            ]);
        }
        $pdo->commit();
    } catch (Throwable $e) {
        if ($pdo->inTransaction()) {
            $pdo->rollBack();
        }
        return false;
    }

    return true;
}

function get_content(string $key, string $default = ''): string
{
    global $cmsContent;
    return isset($cmsContent[$key]) ? $cmsContent[$key] : $default;
}

function get_lines(string $key): array
{
    $value = trim(get_content($key));
    if ($value === '') {
        return [];
    }

    $lines = preg_split('/\r?\n/', $value);
    return array_values(array_filter(array_map('trim', $lines), 'strlen'));
}

function get_pairs(string $key): array
{
    $lines = get_lines($key);
    $pairs = [];
    foreach ($lines as $line) {
        [$title, $text] = array_map('trim', array_pad(explode('|', $line, 2), 2, ''));
        $pairs[] = ['title' => $title, 'text' => $text];
    }
    return $pairs;
}

function is_logged_in(): bool
{
    return isset($_SESSION[CMS_SESSION_KEY]) && $_SESSION[CMS_SESSION_KEY] !== '';
}

function require_login(): void
{
    if (!is_logged_in()) {
        header('Location: /admin/login.php');
        exit;
    }
}

function verify_csrf(string $token): bool
{
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

function generate_csrf_token(): string
{
    $token = bin2hex(random_bytes(16));
    $_SESSION['csrf_token'] = $token;
    return $token;
}

if (!function_exists('str_starts_with')) {
    function str_starts_with(string $haystack, string $needle): bool
    {
        if ($needle === '') {
            return true;
        }
        return substr($haystack, 0, strlen($needle)) === $needle;
    }
}

if (!function_exists('str_contains')) {
    function str_contains(string $haystack, string $needle): bool
    {
        if ($needle === '') {
            return true;
        }
        return strpos($haystack, $needle) !== false;
    }
}
