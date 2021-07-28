<?php
include("db.php");
$result = mysqli_query($con,"SET NAMES utf8");
if (isset($_POST['addsubchapter']))
{
$chapter_id = $_POST['chapter_id'];
$category_id =$_POST['category_id'];
$subcategory_id = $_POST['subcategory_id'];
$subchaptername = $_POST['subchaptername'];

$sql = "INSERT INTO sub_chapters (chapter_id,category_id,sub_category_id,sub_chaptername) VALUES ('$chapter_id','$category_id','$subcategory_id','$subchaptername')";
mysqli_query($con,$sql);
header('location:admin_create_subchapters.php?val=S');
}
?>