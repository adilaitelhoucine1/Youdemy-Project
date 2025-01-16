<?php
require_once '../classes/Cours.php';
$course_id=$_POST["course_id"];
$Cours = new Cours();
$Cours->deleteCourse($course_id);
header("location: Admincours.php");
?>