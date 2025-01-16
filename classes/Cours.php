<?php
require_once '../config/Connect.php';

 class Cours {
    protected $conn;
    
    public function __construct() {
        $connect = new Connect();
        $this->conn = $connect->getConnection();
    }
    
     public function afficher($enseignant_id){}
    

    protected function getTags($course_id) {
        $sql = "SELECT t.* FROM tags t 
                JOIN courstag ct ON t.id_tag = ct.id_tag 
                WHERE ct.course_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$course_id]);
        return $stmt->fetchAll();
    }
    public function deleteCourse($course_id){
        $sql ="DELETE from cours where course_id = ?";
        $stmt=$this->conn->prepare($sql);
        $stmt=$stmt->execute([$course_id]);
    }
} 