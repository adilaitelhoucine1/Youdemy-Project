<?php
require_once '../classes/Utilisateur.php';
$user= new Utilisateur();
$user->seDeconnecter();
header("location: login.php")

?>