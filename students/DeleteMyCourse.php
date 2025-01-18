<?php   
require_once '../classes/Cours.php';
require_once '../classes/Enrollment.php';
$user_id= $_SESSION['user_id'];
$course_id= $_GET['id_course'];
$Enrollment=new Enrollment();
$Enrollment->DeleteMyCourse($course_id,$user_id);
header("location: Mycourses.php");
?>