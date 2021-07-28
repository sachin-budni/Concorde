<?php
include("db.php");
$id = $_GET['imgid'];
$sql="DELETE FROM `gallery_images` WHERE g_id= '$id'";
mysqli_query($con,$sql);
header('location:admin_gallery_images.php');
?>