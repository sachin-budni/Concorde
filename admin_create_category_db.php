<?php
include("db.php");
$result = mysqli_query($con,"SET NAMES utf8");
if (isset($_POST['addcategory']))
{
$categoryname =$_POST['categoryname'];
$packagefees =$_POST['packagefees'];
$sql = "INSERT INTO category (category_name,package_fees) VALUES ('$categoryname','$packagefees')";
mysqli_query($con,$sql);
header('location:admin_create_category.php?val=S');
}
?>