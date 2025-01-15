<?php
require_once '../classes/Administrateur.php';
$user_id= $_POST['user_id'];
$status= $_POST['status'];
$user = new Administrateur();
if($status ===  "supprimé"){
    $user->DeleteUser($user_id);   
}elseif($status ===  "Active" || $status ===  "Suspendu"){
    $user->UpdateRole($user_id,$status); 
}
header("location: users.php");
?>