<?php
include("db.php");
$result = mysqli_query($con,"SET NAMES utf8");
if (isset($_POST['linkupdate']))
{
$chapter_id = $_POST['chapter_id'];
$sub_chapter_id =$_POST['sub_chapter_id'];
$videolink = $_POST['videolink'];

$sql = "INSERT INTO video_link (chapter_id,sub_chapter_id,link) VALUES ('$chapter_id','$sub_chapter_id','$videolink')";
mysqli_query($con,$sql);
header('location:admin_add_link.php?val=S');
}
?>