<?php
require_once '../classes/Categorie.php';
require_once '../classes/Administrateur.php';
$category=new Categorie();
$name=$_POST['category-name'];
$category->ajouterCategorie($name);
header("location: categories.php");
?>