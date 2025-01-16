<?php
require_once 'Cours.php';

class CoursText extends Cours {
    private $contenu;
    public function __construct() {
        $connect = new Connect();
        $this->conn = $connect->getConnection();
    }
    public function ajouter($titre, $description, $enseignant_id, $id_category, $contenu, $tags) {
      
        $sql = "INSERT INTO cours (titre, description, enseignant_id, id_category, content_text) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$titre, $description, $enseignant_id, $id_category, $contenu]);
        
        $courseId = $this->conn->lastInsertId();
        
            $sqlTag = "INSERT INTO courstag (course_id, id_tag) VALUES (?, ?)";
            $stmtTag = $this->conn->prepare($sqlTag);
            foreach ($tags as $tag_id) {
                $stmtTag->execute([$courseId, $tag_id]);
            }
        
        
        return $courseId;
    }

    public function afficher($enseignant_id) {
        $sql = "SELECT c.*, cat.name as category_name 
                FROM cours c 
                LEFT JOIN categorie cat ON c.id_category = cat.id_category 
                WHERE c.enseignant_id = ? AND c.content_text IS NOT NULL";
                
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$enseignant_id]);
        $courses = $stmt->fetchAll();
        
 
        foreach ($courses as &$course) {
            $course['tags'] = $this->getTags($course['course_id']);
        }
        
        return $courses;
    }
} 