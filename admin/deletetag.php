<?php
require_once '../classes/Tags.php';
require_once '../classes/Administrateur.php';
$Tag=new Tags();
$id_tag=$_GET['id_tag'];
//echo $cat_id;
$Tag->DeleteTag($id_tag);
header("location: tags.php");

?>