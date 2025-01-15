<?php
require_once '../config/Connect.php';

 class Cours {
    
    
    public function __construct() {
        $connect = new Connect();
        $this->conn = $connect->getConnection();
    }
    
     public function ajouter($titre, $description, $enseignant_id, $id_category, $contenu, $tags){}
} 