<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require __DIR__ . '/../config.php';

$dbConfig = require __DIR__ . '/../db.php';

spl_autoload_register(function (string $className): void {
    $classPath = __DIR__ . '/classes/' . $className . '.php';
    if (file_exists($classPath)) {
        require $classPath;
    }
});
