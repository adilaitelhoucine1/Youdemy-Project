<?php
require_once 'Utilisateur.php';

class Etudiant extends Utilisateur {
    public function __construct() {
        $connect = new Connect();
        $this->conn = $connect->getConnection();
    }


    public function AddToMyCourse($id_etudiant, $id_cours) {
        $checkSql = "SELECT COUNT(*) FROM enrollment WHERE id_etudiant = ? AND id_cours = ?";
        $checkStmt = $this->conn->prepare($checkSql);
        $checkStmt->execute([$id_etudiant, $id_cours]);
        $exists = $checkStmt->fetchColumn();
    
        if ($exists == 0) {
            $sql = "INSERT INTO enrollment (id_etudiant, id_cours) VALUES (?, ?)";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([$id_etudiant, $id_cours]);
        }
      
    }
    public function getMyCourses($user_id){
        $sql="SELECT * FROM enrollment en JOIN utilisateur u on en.id_etudiant=u.user_id 
        join cours c on c.course_id=en.id_cours 
        WHERE en.id_etudiant= ?";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute([$user_id]);
        return $stmt->fetchAll();
    }
    public function DeleteMyCourse($course_id,$user_id){
    $sql="DELETE from enrollment where id_etudiant = ? and id_cours = ?";
    $stmt=$this->conn->prepare($sql);
    $stmt->execute([$user_id,$course_id]);
    }
} 