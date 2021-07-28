<?php
include("db.php");

if (isset($_POST['editcategory']))
{
$category_id = $_POST['categoryid']; 
$categoryname = $_POST['categoryname'];
$packagefees = $_POST['packagefees'];

$sql = "UPDATE  `category` SET `category_name` = '$categoryname', `package_fees` = '$packagefees' WHERE `category_id` = '$category_id' ";
mysqli_query($con,$sql);
header('location:admin_create_listing.php?val=E');
}
?>