<?php

class Bucketlist {
    private $db;
    private $title = "";
    private $description = "";

    function __construct() {
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

        if ($this->db->connect_errno > 0) {
            die("Fel vid anslutning: " . $this->db->connect_error);
        }
    }

    //READ method to get all bucketlist items
    public function getItems(): array {
        $sql = "SELECT * FROM bucketlist ORDER BY priority;";
        $result = mysqli_query($this->db, $sql);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //CREATE method to add item to bucketlist
    public function addItem(string $title, string $description, string $priority): bool {

        $sql = "INSERT INTO bucketlist(name, description, priority) VALUES ('$this->title', '$this->description', '$priority');";

        $result = mysqli_query($this->db, $sql);
        return $result;
    }

    //DELETE method to remove item from bucketlist
    public function deleteItem(int $id): bool {
        $sql = "DELETE FROM bucketlist WHERE id = $id;";
        $result = mysqli_query($this->db, $sql);
        return $result;
    }

    /*Get- and set-methods */
    public function setTitle(string $title): bool {
        if($title === ""){
            return false;
        } 

        $this->title = $this->db->real_escape_string($title);
        return true;
    
    }

    public function getTitle(): string {
        return $this->title;
    }
    
    public function setDesc(string $description): bool {
        if($description === ""){
            return false;
        } 

        $this->description = $this->db->real_escape_string($description);
        return true;
    
    }

    public function getDesc(): string {
        return $this->description;
    }
    
}