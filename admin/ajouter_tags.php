<?php
require_once '../classes/Tags.php';
require_once '../classes/Administrateur.php';
$Tag=new Tags();
$name=$_POST['tag-name'];
$Tag->ajouter_tag($name);
header("location: tags.php");
?>