<?php
require_once 'Utilisateur.php';
require_once 'Tags.php';
class CoursTag {
    private $cours_id;
    private $id_tag;

    // public function getTags($course_id) {
    //     $sql = "SELECT t.* FROM tags t 
    //             JOIN courstag ct ON t.id_tag = ct.id_tag 
    //             WHERE ct.course_id = ?";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute([$course_id]);
    //     return $stmt->fetchAll();
    // }
} 