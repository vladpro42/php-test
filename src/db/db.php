<?php
class DB
{
    public $conn;
    private $user = 'root';
    private $pass = '';

    public function __construct()
    {
        try {
            $db = new PDO('mysql:host=localhost;dbname=test', $this->user, $this->pass);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn = $db;
        } catch (PDOException $e) {
            die("Failed to connect with MySQL: " . $e->getMessage());
        }
    }
}