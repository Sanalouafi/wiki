<?php

namespace App\database;

require '../../vendor/autoload.php';

use Dotenv\Dotenv;

class Database
{
    private static $pdo;

    public static function connect()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();

        $dsn = "mysql:host={$_ENV['DB_SERVERNAME']};dbname={$_ENV['DB_NAME']};charset=utf8mb4";
        $username = $_ENV['DB_USERNAME'];
        $password = $_ENV['DB_PASSWORD'];

        
        try {
            self::$pdo = new \PDO($dsn, $username, $password);
        } catch (\PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }

        return self::$pdo;
    }
}
