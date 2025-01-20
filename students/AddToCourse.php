<?php
require_once '../classes/Cours.php';
require_once '../classes/Enrollment.php';
require_once '../classes/Etudiant.php';
$course_id = $_POST['course_id'];
$user_id= $_SESSION['user_id'];
$Etudiant = new Etudiant();
$Etudiant->AddToMyCourse($user_id,$course_id);
header("location: Mycourses.php");


?>