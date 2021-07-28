<?php
include("db.php");
$result = mysqli_query($con,"SET NAMES utf8");
if (isset($_POST['addimage']))
{
if (isset($_FILES['img']))
{
if($_FILES['img']['error']==0)
{
$desc = $_POST['desc'];
$targetpath = "gallery_images/";
$targetpath = $targetpath.basename($_FILES['img']['name']);
$imgname	= "gallery_images/".mysqli_real_escape_string($con,$_FILES['img']['name']);

$sql = "INSERT INTO gallery_images (g_desc,g_photoname) VALUES ('$desc','$imgname')";
mysqli_query($con,$sql);
	
	if(move_uploaded_file($_FILES['img']['tmp_name'],$targetpath))
	{	
	header('location:admin_gallery_images.php');
	}
}
else
{
echo "Please update different image";
}

}
}
?>