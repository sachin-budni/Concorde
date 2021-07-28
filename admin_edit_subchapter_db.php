<?php
include("db.php");
$result = mysqli_query($con,"SET NAMES utf8");
if (isset($_POST['editsubchapter']))
{
$sub_chapter_id = $_POST['sub_chapter_id'];
$category_id = $_POST['category_id'];
$subcategory_id = $_POST['subcategory_id'];
$chapter_id = $_POST['chapter_id'];
$subchaptername =$_POST['subchaptername'];
$sql = "UPDATE `sub_chapters` SET `chapter_id` = '$category_id' , `category_id` = '$category_id' , `sub_category_id` = '$subcategory_id' , `sub_chaptername` = '$subchaptername' WHERE `sub_chapter_id` = '$sub_chapter_id' ";
mysqli_query($con,$sql);
header('location:admin_list_subchapters.php?val=E&chapter_id='.$chapter_id);
}
?>