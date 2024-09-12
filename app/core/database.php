<?php

class Database
{
    private static $instance = null;
    private $connection;

    private function __construct()
    {
        try {
            $this->connection = new PDO("mysql:host=localhost;dbname=users", "root", "");
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // INSERT, UPDATE, DELETE uchun write metodi
    public function write($query, $data = [])
    {
        $statement = $this->connection->prepare($query);
        $result = $statement->execute($data);
        return $result; // true yoki false qaytaradi
    }

    // SELECT so'rovlari uchun read metodi
    public function read($query, $data = [])
    {
        $statement = $this->connection->prepare($query);
        $statement->execute($data);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (is_array($result) && count($result) > 0) {
            return $result;
        }
        return false;
    }
}
