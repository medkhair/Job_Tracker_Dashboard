<?php
require_once __DIR__ . '/../config.php';

class Model {
    protected static $pdo;

    public function __construct()
    {
        if (!self::$pdo) {
            $dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8mb4', DB_HOST, DB_NAME);
            self::$pdo = new PDO($dsn, DB_USER, DB_PASS, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        }
    }

    protected function pdo()
    {
        return self::$pdo;
    }
}
