<?php

namespace App\Database;

require '../../vendor/autoload.php';

use PDO;
use PDOException;



class Database
{
    private static $conx;

    public static function connect()
    {
        $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();

        $server = $_ENV['DB_SERVERNAME'];
        $username = $_ENV['DB_USERNAME'];
        $dbpassword = $_ENV['DB_PASSWORD'];
        $dbname = $_ENV['DB_NAME'];

        try {
            self::$conx = new PDO("mysql:host=$server;dbname=$dbname", $username, $dbpassword);
            self::$conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('CONNEXION FAILED: ' . $e->getMessage());
        }
        return self::$conx;
    }
}
