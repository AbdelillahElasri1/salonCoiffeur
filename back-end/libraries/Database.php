<?php

class Database {
    private $host = "localhost";
    private $database_name = "saloncoiffeur";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection(){
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=". $this->host .";dbname=" . $this->database_name , $this->username, $this->password);
            //$this->conn->exec("set names utf8");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $execption) {
            echo "Database could not be connected: ". $execption->getMessage();
        }
        return $this->conn;
    }
}