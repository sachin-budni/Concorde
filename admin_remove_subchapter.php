<?php
include("db.php");
$result = mysqli_query($con,"SET NAMES utf8");
if (isset($_GET['sub_chapter_id']))
{
$sub_chapter_id= $_GET['sub_chapter_id'];
$sql = "DELETE FROM sub_chapters WHERE  sub_chapter_id = '$sub_chapter_id' ";
mysqli_query($con,$sql);
header('location:admin_create_subchapters.php?val=D');	
}
?>