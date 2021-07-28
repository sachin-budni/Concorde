<?php
include("db.php");
$result = mysqli_query($con,"SET NAMES utf8");

$chapter_id = $_GET['chapter_id'];
$sub_chapter_id = $_GET['sub_chapter_id'];
$sql = "DELETE FROM video_link WHERE chapter_id = '$chapter_id' AND sub_chapter_id = '$sub_chapter_id' ";
mysqli_query($con,$sql);
header('location:admin_list_videos.php?val=D');

?>