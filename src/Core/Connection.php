<?php

namespace App\Core;

class Connection
{
    private static $hostnameSQL = "localhost";
    private static $usernameSQL = "root";
    private static $passwordSQL = "";
    private static $databaseSQL = "taskpilot";
    private static $pdo = null;

    public static function pdoCode()
    {
        // Se $PDO for igual a vazio, então passa o código PDO, caso ele já existir então não passa nada.
        if (self::$pdo === null) {
            self::$pdo = new \PDO(
                "mysql:host=" . self::$hostnameSQL . ";dbname=" . self::$databaseSQL . ";charset=utf8mb4",
                self::$usernameSQL,
                self::$passwordSQL,
                [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]
            );
        }
        return self::$pdo;
    }
}