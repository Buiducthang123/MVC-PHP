<?php
class Model
{
    private $conn;

    function connectdb()
    {
        $db = new Database;
        $this->conn = $db->getConnection();
    }
    function getConnection(){
        return $this->conn;
    }

}
