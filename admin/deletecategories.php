<?php
require_once '../classes/Categorie.php';
require_once '../classes/Administrateur.php';
$category=new Categorie();
$cat_id=$_GET['id_category'];
//echo $cat_id;
$categories=$category->DeleteCategory($cat_id);
header("location: categories.php");

?>