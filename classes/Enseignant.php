<?php
require_once '../config/Connect.php';
require_once 'Utilisateur.php';
require_once 'Enrollment.php';

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

    public function getEnseignantById($cours_id){
        $sql="SELECT nom FROM utilisateur u join cours c 
        on u.user_id = c.enseignant_id where c.enseignant_id = ?";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute([$cours_id]);
        $result= $stmt->fetch();
        return $result['nom'];

    }
    public function getMySuscriptions($Enseignant_id){
    $sql ="SELECT * FROM enrollment en JOIN cours c on en.id_cours=c.course_id
     JOIN utilisateur u on u.user_id=en.id_etudiant
      where c.enseignant_id = ?";
      $stmt=$this->conn->prepare($sql);
      $stmt->execute([$Enseignant_id]);
      return $stmt->fetchAll();
    }
} 


?>