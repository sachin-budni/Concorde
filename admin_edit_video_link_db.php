<?php
include("db.php");

if (isset($_POST['linkupdate']))
{
$category_id = $_POST['chapterid']; 
$sub_chapter_id = $_POST['subchapterid'];
$link = $_POST['videolink'];

$sql = "UPDATE  `video_link` SET `link` = '$link' WHERE `chapter_id` = '$category_id' AND `sub_chapter_id` = '$sub_chapter_id' ";
mysqli_query($con,$sql);
header('location:admin_list_videos.php?val=E');
}
?>