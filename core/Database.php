<?php
class Database{
    private $conn;

    public function __construct() {
        if(!file_exists('config.php')){
            echo "co lỗi";
        }
        require_once 'config.php';
        
        $this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
       
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        else{
           
            echo "connect thanh cong";
            echo "<br>";
        }
    }
    public function getConnection(){
        echo "ho";
        return $this->conn;
    }
}