<?php

require_once 'Utilisateur.php';

class Administrateur extends Utilisateur {
    public function __construct() {
        $connect = new Connect();
        $this->conn = $connect->getConnection();
    }


    public function valider_Enseignant($user_id) {
        $sqlUpdate = "UPDATE utilisateur SET actif = 1 WHERE user_id = ?";
        $stmtUpdate =  $this->conn->prepare($sqlUpdate);
        $stmtUpdate->execute([$user_id]);
    }
    public function desactiver_Enseignant($user_id) {
        $sqlUpdate = "UPDATE utilisateur SET actif = 0 WHERE user_id = ?";
        $stmtUpdate =  $this->conn->prepare($sqlUpdate);
        $stmtUpdate->execute([$user_id]);
    }
    public function gererUtilisateur() {}
    public function gererStatistiquesGlobales() {}
    public function gererTags() {}
    public function gererCategories() {}
} 