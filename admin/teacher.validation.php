<?php
require_once '../classes/Administrateur.php';

$user_id= $_POST['teacherID'];
$admin=new Administrateur();
if($_POST['check'] == "approve"){
    $admin->valider_Enseignant($user_id);
    header("location: users.php");
    exit();
}elseif($_POST['check'] == "reject"){
    $admin->desactiver_Enseignant($user_id);
    header("location: users.php");
    exit();
}


?>