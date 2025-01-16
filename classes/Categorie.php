<?php
class Categorie {
    private $id_category;
    private $titre;
    private $description;
    private $date_creation;


    public function __construct() {
        $connect = new Connect();
        $this->conn = $connect->getConnection();
    }

    public function ajouterCategorie($name_category) {
        $query = "INSERT INTO categorie (name) VALUES (?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$name_category]);
    }
   
    public function DeleteCategory($cat_id) {
        $query = "DELETE FROM  categorie where id_category = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$cat_id]);
    }

    public function afficherCategorie() {
        $sql = "SELECT * FROM categorie";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getCountCategorie(){
        $sql="SELECT COUNT(*) as 'count' from categorie";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute();
        $result=$stmt->fetch();
        return $result['count'];
    }
} 