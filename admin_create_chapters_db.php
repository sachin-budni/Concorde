<?php
include("db.php");
$result = mysqli_query($con,"SET NAMES utf8");
if (isset($_POST['addchapter']))
{
$category_id =$_POST['category_id'];
$subcategory_id = $_POST['subcategory_id'];
$chaptername = $_POST['chaptername'];

$sql = "INSERT INTO chapters (category_id,sub_category_id,chapter_name) VALUES ('$category_id','$subcategory_id','$chaptername')";
mysqli_query($con,$sql);
header('location:admin_create_chapters.php?val=S');
}
?>