<?php
include("db.php");

if (isset($_POST['editsubcategory']))
{
$category_id = $_POST['category_id']; 
$sub_category_id = $_POST['sub_category_id'];
$subcategoryname = $_POST['subcategoryname'];
$subcategoryfees = $_POST['subcategoryfees'];


$sql = "UPDATE `sub_category` SET `category_id` = '$category_id' , `sub_category_name` = '$subcategoryname' , `sub_category_fee` = '$subcategoryfees' WHERE `sub_category_id` = '$sub_category_id' ";
mysqli_query($con,$sql);
header('location:admin_create_listing.php?val=E&category_id='.$category_id);
}
?>