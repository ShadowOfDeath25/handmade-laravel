<?php

namespace App\Database;

use Exception;
use PDO;
use PDOException;

class Database
{

    private static $connection;
    private static $host;
    private static $username;
    private static $password;
    private static $database;
    private static $charset;

    private function __construct()
    {
        self::$host = "localhost";
        self::$username = "root";
        self::$password = "";
        self::$database = "nti";
        self::$charset = "utf8mb4";


    }

    private function __clone()
    {

    }

    public function __wakeup()
    {
        throw new Exception("Cannot unserialize singleton");
    }


    public static function connect()
    {
        {
            if (!self::$connection) {
                try {

                    new self();
                    $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$database . ";charset=" . self::$charset;
                    $options = [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES => false,
                        PDO::ATTR_PERSISTENT => false
                    ];
                    self::$connection = new PDO($dsn, self::$username, self::$password, $options);

                } catch (PDOException $e) {
                    throw new Exception("Connection Failed: " . $e->getMessage());
                }
            }

        }
    }

    public static function query($sql, $params = [])
    {
        try {
            if (!self::$connection) {
                self::connect();
            }
            $stmt = self::$connection->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            throw new Exception("Query Failed: " . $e->getMessage());
        }
    }

    public static function execute($sql, $params = [])
    {
        try {
            if (!self::$connection) {
                self::connect();
            }
            $stmt = self::$connection->prepare($sql);
            $stmt->execute($params);
            return $stmt->rowCount();
        } catch (PDOException $e) {
            throw new Exception("Execute failed: " . $e->getMessage());
        }
    }


    public static function getConnection()
    {
        if (!self::$connection) {
            self::connect();
        }
        return self::$connection;
    }

    public static function update($table, $id, $params)
    {
        try {
            if (!self::$connection) {
                self::connect();
            }
            $fields = [];
            $values = [];
            foreach ($params as $key => $value) {
                $fields[] = "$key = ?";
                $values[] = $value;
            }
            $values[] = $id;
            $stmt = self::$connection->prepare("UPDATE $table SET " . implode(", ", $fields) . " WHERE id = ?");
            $stmt->execute($values);
            return $stmt->rowCount();
        } catch (PDOException $e) {
            throw new Exception("Update Failed: " . $e->getMessage());
        }
    }

    public static function find($table, $id)
    {
        try {
            if (!self::$connection) {
                self::connect();
            }
            $stmt = self::$connection->prepare("SELECT * FROM $table WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            throw new Exception("Query Failed: " . $e->getMessage());
        }
    }
}

