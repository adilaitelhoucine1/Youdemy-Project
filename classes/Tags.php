<?php
require_once 'Utilisateur.php';
class Tags {
    private $id_tag;
    private $titre;
    public function __construct() {
        $connect = new Connect();
        $this->conn = $connect->getConnection();
    }
    public function ajouter_tag($name_tag) {
        $query = "INSERT INTO tags (name) VALUES (?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$name_tag]);
        
    }
    public function afficher_tag() {
            $sql = "SELECT * FROM tags";
            $stmt =  $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        
    }

    public function DeleteTag($tag_id) {
        $query = "DELETE FROM  tags where id_tag = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$tag_id]);
    }

} 