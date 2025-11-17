<?php
const CMS_DATA_FILE = __DIR__ . '/../data/content.json';
const CMS_SESSION_KEY = 'cms_user';

const CMS_DB_HOST = 'localhost';
const CMS_DB_PORT = '3306';
const CMS_DB_NAME = 'efcv1044_cms-cocozen';
const CMS_DB_USER = 'efcv1044_cms-cocozen-coco';
const CMS_DB_PASSWORD = 'NhkKk-%#R@th';

const CMS_DEFAULT_ADMIN_USER = 'coralie';
const CMS_DEFAULT_ADMIN_PASS = 'BienEtre2024!';

function cms_env(string $key, string $default = ''): string
{
    $value = getenv($key);
    if ($value === false) {
        return $default;
    }

    $value = trim($value);
    return $value === '' ? $default : $value;
}

function cms_db_dsn(): string
{
    $dsn = cms_env('CMS_DB_DSN');
    if ($dsn !== '') {
        return $dsn;
    }

    $host = cms_env('CMS_DB_HOST', CMS_DB_HOST);
    $port = cms_env('CMS_DB_PORT', CMS_DB_PORT);
    $name = cms_env('CMS_DB_NAME', CMS_DB_NAME);

    return sprintf('mysql:host=%s;port=%s;dbname=%s;charset=utf8mb4', $host, $port, $name);
}

function cms_db_username(): string
{
    return cms_env('CMS_DB_USER', CMS_DB_USER);
}

function cms_db_password(): string
{
    return cms_env('CMS_DB_PASSWORD', CMS_DB_PASSWORD);
}
