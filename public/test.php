<?php
require_once '../config/Connect.php';
echo $_SESSION['user_email'];
// if($_SESSION['role']=="Étudiant"){
//     header("location: ../students/index.php");
// }
// if($_SESSION['role']=="Enseignant"){
//     header("location: ../teachers/dashbaord.php");
// }
?> 