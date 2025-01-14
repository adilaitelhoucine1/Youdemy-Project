<?php
require_once '../config/Connect.php';
require_once 'Utilisateur.php';

class Enseignant extends Utilisateur {
    public function __construct() {
        $connect = new Connect();
        $this->conn = $connect->getConnection();
    }
    
    public function showallEnseignants() {
        $sql = "SELECT * FROM utilisateur where role = 'Enseignant'";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
} 


?>