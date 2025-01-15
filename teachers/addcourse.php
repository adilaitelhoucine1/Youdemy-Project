<?php
$title = $_POST['title'];
$description = $_POST['description'];
$category = $_POST['category'];
$tags = $_POST['tags'];
$contentType = $_POST['contentType'];

if($contentType === 'text') {
   $content = $_POST['content'];
   $videoUrl = '';
} else {
   $videoUrl = $_POST['videoUrl']; 
   $content = '';
}

?>