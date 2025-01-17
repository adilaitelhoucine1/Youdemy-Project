<?php
require_once '../classes/Tags.php';
require_once '../classes/Administrateur.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $tags = $_POST['tag-name'];
    $allTags = explode(",",$tags);
    $tagsArray = [];
    foreach($allTags as $tags){
        $trimmedTag = trim($tags);
        array_push($tagsArray,$trimmedTag);
    }

    $tag = new Tags();
    foreach($tagsArray as $t){

        $tag->ajouter_tag($t);
    }
    header("location: tags.php");
}
?>