<?php
require_once '../config/Connect.php';
require_once 'Utilisateur.php';

class Enseignant extends Utilisateur {
    public function __construct() {
        $connect = new Connect();
        $this->conn = $connect->getConnection();
    }
    public function addEnseignant($Enseignant_id) {
        $query = "INSERT INTO enseignant (enseignant_id ) VALUES (?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$Enseignant_id]);
        
    }
    public function showallEnseignants() {
        $sql = "SELECT * FROM utilisateur where role = 'Enseignant'";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function CheckActifEnseignant($Enseignant_id) {
        $sql = "SELECT actif FROM utilisateur where user_id = ?";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute([$Enseignant_id]);
        $result =$stmt->fetch();
        return $result['actif'];
    }
    

    public function getCountEnseignant(){
        $sql="SELECT COUNT(*) as 'count' from utilisateur where role = 'Enseignant'";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute();
        $result=$stmt->fetch();
        return $result['count'];
    }
} 


?>