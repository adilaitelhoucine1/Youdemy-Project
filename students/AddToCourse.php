<?php
require_once '../classes/Cours.php';
require_once '../classes/Enrollment.php';
$course_id = $_POST['course_id'];
$user_id= $_SESSION['user_id'];
$Enrollment = new Enrollment();
$Enrollment->AddToMyCourse($user_id,$course_id);
header("location: Mycourses.php");


?>