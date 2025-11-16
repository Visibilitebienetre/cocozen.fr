<?php
require_once __DIR__ . '/config.php';

function cms_db(): PDO
{
    static $pdo = null;

    if ($pdo instanceof PDO) {
        return $pdo;
    }

    try {
        $pdo = new PDO(
            CMS_DB_DSN,
            CMS_DB_USER,
            CMS_DB_PASSWORD,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]
        );
    } catch (PDOException $e) {
        http_response_code(500);
        exit('Connexion à la base de données impossible.');
    }

    initialize_cms_schema($pdo);

    return $pdo;
}

function initialize_cms_schema(PDO $pdo): void
{
    $pdo->exec(<<<SQL
        CREATE TABLE IF NOT EXISTS cms_content (
            content_key VARCHAR(191) PRIMARY KEY,
            content_value MEDIUMTEXT NOT NULL,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
    SQL);

    $pdo->exec(<<<SQL
        CREATE TABLE IF NOT EXISTS cms_users (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(191) NOT NULL UNIQUE,
            password_hash VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
    SQL);

    seed_default_admin($pdo);
    seed_default_content($pdo);
}

function seed_default_admin(PDO $pdo): void
{
    $stmt = $pdo->query('SELECT COUNT(*) AS total FROM cms_users');
    $count = (int) ($stmt->fetch()['total'] ?? 0);

    if ($count === 0) {
        $insert = $pdo->prepare('INSERT INTO cms_users (username, password_hash) VALUES (:username, :hash)');
        $insert->execute([
            ':username' => CMS_DEFAULT_ADMIN_USER,
            ':hash' => password_hash(CMS_DEFAULT_ADMIN_PASS, PASSWORD_DEFAULT),
        ]);
    }
}

function seed_default_content(PDO $pdo): void
{
    $stmt = $pdo->query('SELECT COUNT(*) AS total FROM cms_content');
    $count = (int) ($stmt->fetch()['total'] ?? 0);

    if ($count > 0 || !file_exists(CMS_DATA_FILE)) {
        return;
    }

    $json = file_get_contents(CMS_DATA_FILE);
    $data = json_decode($json, true);

    if (!is_array($data) || empty($data)) {
        return;
    }

    $insert = $pdo->prepare('INSERT INTO cms_content (content_key, content_value) VALUES (:key, :value)');
    foreach ($data as $key => $value) {
        $insert->execute([
            ':key' => $key,
            ':value' => (string) $value,
        ]);
    }
}
