<?php

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "@Vmn_6887!7886";
    private $dbname = "harmony_vibe_music";
    private $conn;

    // Constructor to establish the database connection
    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    // Method to get the database connection
    public function getConnection() {
        return $this->conn;
    }

    // Method for generic query execution
    public function executeQuery($query, $data = []) {
        $stmt = $this->conn->prepare($query);
        $success = $stmt->execute($data);

        return $success ? $stmt : false;
    }

    // Method to fetch multiple rows
    public function fetchAllRows($query, $data = []) {
        $stmt = $this->executeQuery($query, $data);

        return $stmt ? $stmt->fetchAll(PDO::FETCH_OBJ) : false;
    }

    // Method to fetch a single row
    public function fetchSingleRow($query, $data = []) {
        $stmt = $this->executeQuery($query, $data);

        return $stmt ? $stmt->fetch(PDO::FETCH_OBJ) : false;
    }
}

// Example usage:
// $db = new Database();
// $conn = $db->getConnection();
// Use $conn for database queries
