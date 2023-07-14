<?php

require_once __DIR__ . '\vendor\autoload.php';

use app\controllers\AuthController;
use app\controllers\SiteController;
use htethtetoo\phpmvc\Application;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$config = [
    'userClass'=>\app\models\User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];
$app = new Application(__DIR__, $config);

$app->db->applyMigration();
