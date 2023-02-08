<?php
// build class employe inside model 

    class Appointement extends Database
    {
        // properties
        public $id;
        public $create_at;
        public $end_at;
        // table name
        public $db_table = "appointement";

        // method 

        public function __construct($db)
        {
            $this->conn = $db;
        }

        // Get All
        public function getAppoint() {
            $sqlQuery = "SELECT id, create_at, end_at FROM ". $this->db_table;
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }
        // create 
        public function createAppointement(){
            $sqlQuery = "
                        INSERT INTO " . $this->db_table . "
                        SET 
                        create_at = :create_at,
                        end_at = :end_at
                        ";
            $stmt = $this->conn->prepare($sqlQuery);

            // sanitize 
            $this->create_at=htmlspecialchars(strip_tags($this->create_at));
            $this->end_at=htmlspecialchars(strip_tags($this->end_at));
            
            // bind data
            $stmt->bindParam(":create_at", $this->create_at);
            $stmt->bindParam(":end_at", $this->end_at);
           

            if($stmt->execute()){
                return true;
            }
            return false;   
        }
        // Read single
        public function getSingleAppointement(){
            $sqlQuery = "SELECT
                            id, 
                            create_at, 
                            end_at
                        FROM
                            ". $this->db_table ."
                            WHERE 
                            id = ?
                            LIMIT 0,1";
                            
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->create_at = $dataRow['create_at'];
            $this->end_at = $dataRow['end_at'];
        }

        // UPDATE 
        public function updateAppointement(){
            $sqlQuery = "UPDATE
                            ". $this->db_table ."
                        SET
                            create_at = :create_at, 
                            end_at = :end_at
                        WHERE 
                            id = :id";

            $stmt = $this->conn->prepare($sqlQuery);

            $this->id=htmlspecialchars(strip_tags($this->id));
            $this->create_at=htmlspecialchars(strip_tags($this->create_at));
            $this->end_at=htmlspecialchars(strip_tags($this->end_at));
           
            // bind data
            $stmt->bindParam(":create_at", $this->create_at);
            $stmt->bindParam(":end_at", $this->end_at);
            

            if ($stmt->execute()) {
                return true;
            }
            return false;
        }

        // DELETE
        public function deleteAppointement(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);

            $this->id = htmlspecialchars(strip_tags($sqlQuery));

            $stmt->bindParam(1, $this->id);

            if($stmt->execute()){
                return true;
            }
            return false;
        }

    }

        
    

?>

