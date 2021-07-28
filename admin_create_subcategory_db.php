<?php
include("db.php");
$result = mysqli_query($con,"SET NAMES utf8");
if (isset($_POST['addsubcategory']))
{
$category_id = $_POST['category_id'];
$subcategoryname =$_POST['subcategoryname'];
$subjectfees =$_POST['subjectfees'];
$sql = "INSERT INTO sub_category (sub_category_name,category_id,sub_category_fee) VALUES ('$subcategoryname','$category_id','$subjectfees')";
mysqli_query($con,$sql);
header('location:admin_create_subcategory.php?val=S');
}
?>