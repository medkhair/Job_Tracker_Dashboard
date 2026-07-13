<?php
// Local development configuration — adjust for your environment
ini_set('display_errors', 1);
error_reporting(E_ALL);

define('DB_HOST', 'localhost:3306');
define('DB_NAME', 'job_tracker');
define('DB_USER', 'root');
define('DB_PASS', '');

// Simple autoloader for controllers/models
spl_autoload_register(function ($class) {
    $paths = [
        __DIR__ . '/app/controllers/' . $class . '.php',
        __DIR__ . '/app/models/' . $class . '.php',
        __DIR__ . '/app/' . $class . '.php'
    ];
    foreach ($paths as $p) {
        if (file_exists($p)) {
            require_once $p;
            return;
        }
    }
});
