<?php
include("db.php");
$result = mysqli_query($con,"SET NAMES utf8");
if (isset($_GET['chapter_id']))
{
$chapter_id= $_GET['chapter_id'];
$sql = "DELETE FROM chapters WHERE  chapter_id = '$chapter_id' ";
mysqli_query($con,$sql);
header('location:admin_create_chapters.php?val=D');	
}
?>