<?php
include("db.php");
$result = mysqli_query($con,"SET NAMES utf8");
if (isset($_POST['editchapter']))
{
$chapter_id = $_POST['chapter_id'];

$category_id = $_POST['category_id'];
$subcategory_id = $_POST['subcategory_id'];
$chaptername =$_POST['chaptername'];

$sql = "UPDATE `chapters` SET `category_id` = '$category_id' , `sub_category_id` = '$subcategory_id' , `chapter_name` = '$chaptername' WHERE `chapter_id` = '$chapter_id' ";
mysqli_query($con,$sql);
header('location:admin_list_chapters.php?val=E&sub_category_id='.$subcategory_id);
}
?>