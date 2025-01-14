<?php
session_start();
class Connect {
    private $host = "localhost";
    private $dbName = "youdemy"; 
    private $username = "root"; 
    private $password = "";
    private $connection; 

   
    public function getConnection() {
        $this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbName, $this->username,$this->password);
        $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $this->connection;
    }
}
?>