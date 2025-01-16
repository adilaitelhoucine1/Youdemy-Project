<?php
require_once '../classes/Enseignant.php';
require_once '../classes/Administrateur.php';
require_once '../classes/CoursText.php';
require_once '../classes/CoursVideo.php';
require_once '../classes/Categorie.php';
require_once '../classes/Tags.php';

$enseignant_id=$_SESSION['user_id'];
$title = $_POST['title'];
$description = $_POST['description'];
$category = $_POST['category'];
$tags = $_POST['tags'];
$contentType = $_POST['contentType'];

if($contentType === 'text') {
   $content = $_POST['content'];
   $CoursText = new CoursText();
   $CoursText->ajouter($title,$description,$enseignant_id,$category,$content,$tags);
} else {
   $videoUrl = $_POST['videoUrl']; 
   $CoursVideo = new CoursVideo();
   $CoursVideo->ajouter($title,$description,$enseignant_id,$category,$videoUrl,$tags);
}
header("location: cours.php");
?>