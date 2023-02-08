<?php

    class Client extends Database
    {
        // properties
        public $id;
        public $first_name;
        public $last_name;
        public $phone;
        public $reference_id;
        // method

        // DB connection
        public function __construct($db)
        {
            $this->conn = $db;
        }

        // create 
        public function createClient(){
            $sqlQuery = "
                        INSERT INTO " . $this->db_table . "
                        SET 
                        first_name = :first_name,
                        last_name = :last_name,
                        phone = :phone
                        ";
            $stmt = $this->conn->prepare($sqlQuery);

            // sanitize 
            $this->first_name=htmlspecialchars(strip_tags($this->first_name));
            $this->last_name=htmlspecialchars(strip_tags($this->last_name));
            $this->phone=htmlspecialchars(strip_tags($this->phone));
            
            // bind data
            $stmt->bindParam(":first_name", $this->first_name);
            $stmt->bindParam(":last_name", $this->last_name);
            $stmt->bindParam(":phone", $this->phone);

            if($stmt->execute()){
                return true;
            }
            return false;   
        }
        // UPDATE 
        public function updateClient(){
            $sqlQuery = "UPDATE
                            ". $this->db_table ."
                        SET
                            first_name = :first_name, 
                            last_name = :last_name, 
                            phone = :phone
                        WHERE 
                            id = :id";

            $stmt = $this->conn->prepare($sqlQuery);

            $this->first_name=htmlspecialchars(strip_tags($this->first_name));
            $this->last_name=htmlspecialchars(strip_tags($this->last_name));
            $this->phone=htmlspecialchars(strip_tags($this->phone));

            // bind data
            $stmt->bindParam(":id", $this->id);
            $stmt->bindParam(":first_name", $this->first_name);
            $stmt->bindParam(":last_name", $this->last_name);
            $stmt->bindParam(":phone", $this->phone);

            if ($stmt->execute()) {
                return true;
            }
            return false;
        }
    }