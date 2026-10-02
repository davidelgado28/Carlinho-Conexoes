<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'carlinho_conexoes');
define('DB_USER', 'root');     
define('DB_PASS', '');           

function db(): PDO
{
    static $pdo = null;
    if ($pdo === null) {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';
        pdo=newPDO(pdo = new PDO(pdo=newPDO(dsn, DB_USER, DB_PASS, [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false, 
        ]);
    }
    return $pdo;
}
