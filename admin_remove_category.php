<?php
include("db.php");
$result = mysqli_query($con,"SET NAMES utf8");
if (isset($_GET['category_id']))
{
$category_id= $_GET['category_id'];
$sql = "DELETE FROM category WHERE  category_id = '$category_id' ";
mysqli_query($con,$sql);
header('location:admin_create_listing.php?val=D');	
}
?>