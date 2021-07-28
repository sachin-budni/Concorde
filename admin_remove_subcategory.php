<?php
include("db.php");
$result = mysqli_query($con,"SET NAMES utf8");
if (isset($_GET['sub_category_id']))
{
$sub_category_id= $_GET['sub_category_id'];
$sql = "DELETE FROM sub_category WHERE sub_category_id = '$sub_category_id' ";
mysqli_query($con,$sql);
header('location:admin_list_subcategory.php?val=D');
}
?>