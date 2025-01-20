<?php
require_once '../config/Connect.php';

class Utilisateur {
    private $user_id;
    private $user_email;
    private $password;
    private $nom;
    private $actif;
    private $date_creation;
    private $conn;

    public function __construct() {
        $connect = new Connect();
        $this->conn = $connect->getConnection();
    }
    public function getUserId() {
        return $this->user_id;
    }

    public function getUserEmail() {
        return $this->user_email;
    }

    public function getNom() {
        return $this->nom;
    }

   
    public function setUserEmail($email) {
        $this->user_email = $email;
    }

    public function setPassword($password) {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function connexion($email, $password) {
        $query = "SELECT * FROM utilisateur WHERE user_email = ? ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$email]);
        
        if ($stmt->rowCount() == 0) {
            return false;
        }

        $user = $stmt->fetch();
        if (!password_verify($password, $user['user_password'])) {
            echo "Mot de passe incorrect.";
            exit; 
        }

        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user_email'] = $user['user_email'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['role'] = $user['role'];

        //return $user['role'];
    }

    public function inscription($email, $password, $nom, $role) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        if($role === 'Enseignant') {
            $actif=0;
            
        } else if($role === 'Étudiant') {
         $actif=1;
        }
        

        $query = "INSERT INTO utilisateur (user_email, user_password, nom, actif, role) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$email, $hashed_password, $nom, $actif, $role]);
    }

    public function seDeconnecter() {
        session_unset();
        session_destroy();
        return true; 
    }

    public function showallUssers() {
        $sql = "SELECT * FROM utilisateur where role not in ('admin', 'Enseignant')";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function emailExiste($email) {
        $query = "SELECT COUNT(*) FROM utilisateur WHERE user_email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$email]);
        
        return $stmt->fetchColumn() > 0; 
    }

    public function getCountUsers(){
        $sql="SELECT COUNT(*) as 'count' from utilisateur where role <> 'admin' and status <> 'Suspendu'";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute();
        $result=$stmt->fetch();
        return $result['count'];
    }

    public function CheckUserstatus($Enseignant_id) {
        $sql = "SELECT status FROM utilisateur where user_id = ?";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute([$Enseignant_id]);
        $result =$stmt->fetch();
        return $result['status'];
    }
}
$user = new Utilisateur();
 $user->CheckUserstatus(113);



?>